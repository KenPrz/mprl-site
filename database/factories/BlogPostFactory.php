<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(5, true),
            'category_id' => rand(1, 10),
            'is_published' => $this->faker->boolean(70),
            'created_by' => 1,
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
            'updated_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
