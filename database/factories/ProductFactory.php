<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category_id' => rand(1,10),
            'power_out' => $this->faker->randomElement(['100W', '200W', '300W']),
            'efficiency' => $this->faker->randomElement(['15%', '17%', '20%']),
            'dimension' => $this->faker->randomElement(['100x100x50 mm', '150x150x60 mm']),
            'weight' => $this->faker->randomFloat(2, 1, 20) . ' kg',
            'type' => $this->faker->word,
            'voltage' => $this->faker->randomElement(['12V', '24V', '48V']),
            'current' => $this->faker->randomElement(['5A', '10A', '20A']),
            'temp_coeff' => $this->faker->randomElement(['-0.45%/°C', '-0.39%/°C']),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 0.5) * 100 . '%',
            'warranty' => $this->faker->randomElement(['1 year', '2 years', '5 years']),
            'stock_level' => $this->faker->numberBetween(0, 100),
            'supplier' => $this->faker->company,
            'certification' => $this->faker->randomElement(['CE', 'ISO', 'TUV']),
            'desciption' => $this->faker->paragraph,
            'img_path' => $this->faker->imageUrl(640, 480, 'products', true),
            'datasheet' => $this->faker->url,
            'is_displayed' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
