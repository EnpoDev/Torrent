<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'key' => 'top_notify',
                'value' => true,
            ],
            [
                'key' => 'top_notify_text',
                'value' => "⚡ Sitemiz yeni açıldığı için her gün 5 yeni oyun ekleniyor! En güncel içerikler için takipte kalın.⭐",
            ],
            [
                'key' => "hero_text_area1",
                'value' => "Yeni Nesil"
            ],
            [
                'key' => "hero_text_area2",
                'value' => "Torrent Oyun"
            ],
            [
                'key' => "hero_text_area3",
                'value' => "Platformu 🎮"
            ],
            [
                'key' => "hero_description",
                'value' => "Virüssüz ve reklamsız torrent oyunların güvenli adresi. Hızlı, temiz ve %100 oyuncu dostu bir indirme deneyimi. 🚀"
            ],
            [
                'key' => "site_name",
                'value' => "Zirve Oyun İndir"
            ],
            [
                "key" => "site_subtitle",
                "value" => "Torrent Oyun Indir"
            ]
        ]);
    }

}
