<?php
// App\Observers\HeaderLinkObserver.php
namespace App\Observers;

use App\Models\HeaderLink;
use Illuminate\Support\Facades\Cache;

class HeaderLinkObserver
{
    public function created(HeaderLink $headerLink): void
    {
        $this->clearMenuCache();
    }

    public function updated(HeaderLink $headerLink): void
    {
        $this->clearMenuCache();
    }

    public function deleted(HeaderLink $headerLink): void
    {
        $this->clearMenuCache();
    }

    private function clearMenuCache(): void
    {
        Cache::forget('header_menu_items');
    }
}
