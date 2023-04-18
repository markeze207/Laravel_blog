<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition()
    {
        return [
            'title' => fake()->title,
            'content' => fake()->text,
            'image' => fake()->imageUrl,
            'likes' => random_int(1, 200),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
