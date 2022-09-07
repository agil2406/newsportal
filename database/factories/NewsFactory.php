<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author' => User::factory(),
            'title' => $title = $this->faker->title(),
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(25),
            'image' => 'https://picsum.photos/200/300',
        ];
    }
}
