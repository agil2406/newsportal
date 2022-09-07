<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => $name = 'Website Ecommerce',
            'slug' => Str::slug($name),
        ]);
        Category::create([
            'name' => $name = 'Website automotive',
            'slug' => Str::slug($name),
        ]);
        Category::create([
            'name' => $name = 'Website Government',
            'slug' => Str::slug($name),
        ]);
    }
}
