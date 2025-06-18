<?php

namespace Database\Seeders;

use App\Models\HeaderLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeaderLink::insert([
            [
                "id" => 1,
                "title" => "Anasayfa",
                "link" => "/",
                "target" => "_self",
                "top_menu" => 0
            ],
            [
                "id" => 2,
                "title" => "Torrent Nedir?",
                "link" => "/torrent-nedir",
                "target" => "_self",
                "top_menu" => 0
            ],
            [
                "id" => 3,
                "title" => "Oyun Kategorileri",
                "link" => "#",
                "target" => "_self",
                "top_menu" => 0
            ],
            // Game Categories
            [
                "id" => 4,
                "title" => "Öne Çıkan Oyunlar",
                "link" => "/kategori/one-cikan-oyunlar",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 5,
                "title" => "Açık Dünya Oyunları",
                "link" => "/kategori/acik-dunya-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 6,
                "title" => "Aksiyon Oyunları",
                "link" => "/kategori/aksiyon-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 7,
                "title" => "Macera Oyunları",
                "link" => "/kategori/macera-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 8,
                "title" => "FPS Oyunlar",
                "link" => "/kategori/fps-oyunlar",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 9,
                "title" => "Hayatta Kalma Oyunları",
                "link" => "/kategori/hayatta-kalma-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 10,
                "title" => "Spor Oyunları",
                "link" => "/kategori/spor-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 11,
                "title" => "Yarış Oyunları",
                "link" => "/kategori/yaris-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 12,
                "title" => "Strateji Oyunları",
                "link" => "/kategori/strateji-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 13,
                "title" => "Simulasyon Oyunları",
                "link" => "/kategori/simulasyon-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 14,
                "title" => "Dövüş Oyunları",
                "link" => "/kategori/dovus-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 15,
                "title" => "Korku Oyunları",
                "link" => "/kategori/korku-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 16,
                "title" => "Platform Oyunları",
                "link" => "/kategori/platform-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 17,
                "title" => "Erken Erişim Oyunları",
                "link" => "/kategori/erken-erisim-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 18,
                "title" => "VR Oyunları",
                "link" => "/kategori/vr-oyunlari",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 19,
                "title" => "RPG Oyunlar",
                "link" => "/kategori/rpg-oyunlar",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 20,
                "title" => "EK Paketler",
                "link" => "/kategori/ek-paketler",
                "target" => "_self",
                "top_menu" => 3
            ],
            [
                "id" => 21,
                "title" => "Türkçe Oyunlar",
                "link" => "/kategori/turkce-oyunlar",
                "target" => "_self",
                "top_menu" => 3
            ],
            // Other main menu items
            [
                "id" => 22,
                "title" => "Türkçe Yamalar",
                "link" => "/turkce-yamalar",
                "target" => "_self",
                "top_menu" => 0
            ],
            [
                "id" => 23,
                "title" => "Hakkımızda",
                "link" => "/hakkimizda",
                "target" => "_self",
                "top_menu" => 0
            ],
            [
                "id" => 24,
                "title" => "S.S.S.",
                "link" => "/sss",
                "target" => "_self",
                "top_menu" => 0
            ],
            [
                "id" => 25,
                "title" => "İletişim",
                "link" => "/iletisim",
                "target" => "_self",
                "top_menu" => 0
            ]
        ]);
    }
}
