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
            'images/bg-1.jpg',
            'images/bg-2.jpg',
            'images/bg-3.jpg',
            'images/bg-4.jpg',
            'images/bg-5.jpg',
            'images/bg-6.jpg',
            'images/bg-7.jpg',
            'images/bg-8.jpg',
            'images/bg-9.jpg',
            'images/bg-10.jpg',
            'images/bg-11.jpg',
            'images/bg-12.jpg',
            'images/bg-13.jpg',
            'images/bg-14.jpg',
            'images/bg-15.jpg',
            'images/bg-16.jpg',
            'images/bg-17.jpg',
            'images/bg-18.jpg',
            'images/bg-19.jpg',
        ];
        return [
            // 'image' => $this->faker->image('public/storage/', rand(480,1080), rand(480,1080), null, false, true, $this->faker->word, false),
            // 'image' => 'def.png',
            'image' => $images[rand(0, 5)],
            'blog_post_id' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
