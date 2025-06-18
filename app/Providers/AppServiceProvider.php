<?php
// App\Providers\AppServiceProvider.php
namespace App\Providers;

use App\Models\HeaderLink;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Header menü verilerini tüm view'larda paylaş
        View::composer('*', function ($view) {
            $menuItems = $this->getMenuItems();
            $view->with('menuItems', $menuItems);
        });

        View::composer('components.public.header', function ($view) {
            $setting = Setting::pluck('value', 'key');
            $view->with('setting', $setting);
        });
    }

    /**
     * Menü öğelerini organize et ve cache'le
     */
    private function getMenuItems()
    {
        // Debug modu - geçici olarak cache'siz çalıştır
        $headerLinks = HeaderLink::orderBy('id')->get();

        // Debug çıktısını log'a yaz (dd yerine)
        Log::info('=== MENU DEBUG ===');
        Log::info('Raw Data:', $headerLinks->toArray());

        $organizedItems = $this->organizeMenuItems($headerLinks);

        // Organize edilmiş veriyi de log'a yaz
        Log::info('Organized Menu Items:', $organizedItems);

        return $organizedItems;

        // Prodüksiyon için cache'li versiyon (yukarıdaki debug kodlarını kaldırdıktan sonra bu kısmı kullan)
        /*
        return Cache::remember('header_menu_items', 60 * 60, function () {
            $headerLinks = HeaderLink::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
            return $this->organizeMenuItems($headerLinks);
        });
        */
    }

    /**
     * Header linklerini menü yapısına organize et
     */
    private function organizeMenuItems($headerLinks)
    {
        $menuItems = [];
        $subMenus = [];

        // İlk olarak tüm linkleri kategorize et
        foreach ($headerLinks as $link) {
            if ($link->top_menu == 0 || $link->top_menu === null) {
                // Ana menü öğesi
                $menuItems[] = [
                    'id' => $link->id,
                    'title' => $link->title,
                    'link' => $link->link,
                    'target' => $link->target ?? '_self',
                    'order' => $link->order ?? 999,
                    'children' => [],
                    'has_children' => false
                ];
            } else {
                // Alt menü öğesi
                if (!isset($subMenus[$link->top_menu])) {
                    $subMenus[$link->top_menu] = [];
                }
                $subMenus[$link->top_menu][] = [
                    'id' => $link->id,
                    'title' => $link->title,
                    'link' => $link->link,
                    'target' => $link->target ?? '_self',
                    'parent_id' => $link->top_menu,
                    'order' => $link->order ?? 999
                ];
            }
        }

        // Alt menüleri sırala
        foreach ($subMenus as $parentId => &$children) {
            usort($children, function ($a, $b) {
                return $a['order'] <=> $b['order'];
            });
        }

        // Ana menüleri sırala
        usort($menuItems, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        // Alt menüleri ana menülere bağla
        foreach ($menuItems as &$menuItem) {
            if (isset($subMenus[$menuItem['id']])) {
                $menuItem['children'] = $subMenus[$menuItem['id']];
                $menuItem['has_children'] = true;
            }
        }

        // Boş ana menüleri temizle - SADECE gerçekten boş olanları kaldır
        $filteredMenuItems = array_filter($menuItems, function ($item) {
            // Sadece başlığı boş olanları kaldır, # linkli olanları tutmaya devam et
            return !empty(trim($item['title']));
        });

        // Array'i yeniden indeksle ve return et
        return array_values($filteredMenuItems);
    }

    /**
     * Alternatif basit organize metodu
     */
    private function organizeMenuItemsSimple($headerLinks)
    {
        $menuItems = [];

        // Ana menüleri al ve sırala
        $mainMenus = $headerLinks->where('top_menu', 0)->sortBy('order');

        foreach ($mainMenus as $mainMenu) {
            // Bu ana menüye ait alt menüleri bul
            $subMenus = $headerLinks->where('top_menu', $mainMenu->id)->sortBy('order');

            $menuItem = [
                'id' => $mainMenu->id,
                'title' => $mainMenu->title,
                'link' => $mainMenu->link,
                'target' => $mainMenu->target ?? '_self',
                'children' => [],
                'has_children' => false
            ];

            // Alt menüleri ekle
            foreach ($subMenus as $subMenu) {
                $menuItem['children'][] = [
                    'id' => $subMenu->id,
                    'title' => $subMenu->title,
                    'link' => $subMenu->link,
                    'target' => $subMenu->target ?? '_self',
                    'parent_id' => $subMenu->top_menu
                ];
            }

            // Alt menü kontrolü
            if (!empty($menuItem['children'])) {
                $menuItem['has_children'] = true;
            }

            // Tüm menüleri ekle (title boş değilse)
            if (!empty(trim($menuItem['title']))) {
                $menuItems[] = $menuItem;
            }
        }

        return $menuItems;
    }

    /**
     * Debug için - Log kullanarak
     */
    private function debugMenuItemsToLog($headerLinks)
    {
        $debugInfo = [
            'raw_data' => $headerLinks->map(function ($link) {
                return "ID: {$link->id} | Title: {$link->title} | Top Menu: {$link->top_menu} | Link: {$link->link}";
            })->toArray(),
            'main_menus' => $headerLinks->where('top_menu', 0)->map(function ($menu) {
                return "ID: {$menu->id} | Title: {$menu->title}";
            })->toArray(),
            'sub_menus' => $headerLinks->where('top_menu', '!=', 0)->map(function ($menu) {
                return "ID: {$menu->id} | Title: {$menu->title} | Parent: {$menu->top_menu}";
            })->toArray()
        ];

        Log::info('Menu Debug Info:', $debugInfo);
        return $debugInfo;
    }
}
