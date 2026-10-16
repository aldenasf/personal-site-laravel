<?php

namespace Database\Factories;

use App\Models\Post;
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
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');
        $updatedAt = fake()->boolean(30) ? fake()->dateTimeBetween($createdAt, 'now') : $createdAt;

        return [
            'title' => fake()->text(64),
            'description' => fake()->text(255),
            'content' => fake()->realText(2048),
            'pinned' => false,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
