<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogImage>
 */
class BlogImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'bg-1.jpg',
            'bg-2.jpg',
            'bg-3.jpg',
            'bg-4.jpg',
            'bg-5.jpg',
            'bg-6.jpg',
        ];
        return [
            // 'image' => $this->faker->image('public/storage/', rand(480,1080), rand(480,1080), null, false, true, $this->faker->word, false),
            // 'image' => 'def.png',
            'image' => $images[rand(0, 5)],
            'blog_post_id' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
