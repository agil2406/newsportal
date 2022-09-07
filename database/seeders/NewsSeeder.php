<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => $title = 'Hot Hatch Toyota GR Corolla Meluncur, Harga Rp 500 Jutaan',
            'slug' => Str::slug($title),
            'category_id' => 2,
            'user_id' => 1,
            'description' => 'Hot Hatch Toyota GR Corolla Meluncur, Harga Rp 500 Jutaan',
            'image' => 'news-image/mountaint.jpg'

        ]);
        News::create([
            'title' => $title = 'Pentingnya Transformasi Digital pada UMKM untuk Bisa Bertahan',
            'slug' => Str::slug($title),
            'category_id' => 1,
            'user_id' => 2,
            'description' => 'Pentingnya Transformasi Digital pada UMKM untuk Bisa Bertahan',
            'image' => 'news-image/mountaint.jpg'

        ]);
    }
}
