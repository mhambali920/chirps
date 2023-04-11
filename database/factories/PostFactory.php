<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(10);
        $slug = Str::slug($title, "-");
        return [
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 7),
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $this->faker->paragraph(1),
            'body' => $this->faker->paragraph(10),
            'published_at' => now()
        ];
    }
}
