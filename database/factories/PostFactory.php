<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'konten' => collect($this
            -> faker
            -> paragraphs(mt_rand(5, 10)))
            -> map(function ($p): string{
                return "<p>{$p}</p>";
            })->implode(''),
            'slug' => $this->faker->slug(),
            'user_id' => mt_rand(1, 2),
            'category_id' => mt_rand(1, 3),
            'image' => 'image' . mt_rand(1, 3) . '.jpg',
        ];

        Post::factory(20)->create();
    }
}
