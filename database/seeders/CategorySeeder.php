<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'id' => 1,
                'name' => '🏹Aksiyon',
                'slug' => 'aksiyon',
                'show_in_home_screen' => true,
                "view_option" => "category-opt1",
            ],
            [
                'id' => 2,
                'name' => '♟️Strateji',
                'slug' => 'strateji',
                'show_in_home_screen' => true,
                "view_option" => "category-opt2",
            ],
            [
                'id' => 3,
                'name' => '⚽Spor',
                'slug' => 'spor',
                'show_in_home_screen' => true,
                "view_option" => "category-opt3",
            ],
            [
                'id' => 4,
                'name' => '🌍Açık Dünya',
                'slug' => 'acik_dunya',
                'show_in_home_screen' => true,
                "view_option" => "category-opt4",
            ],
        ]);
    }
}
