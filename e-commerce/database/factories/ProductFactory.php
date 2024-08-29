<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(), // Generates a random sentence
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generates a random float number for price
            'category_id' => 2,
            'stock_quantity' => $this->faker->numberBetween(1, 100), // Random stock quantity
            'image_url' => $this->faker->imageUrl(), // Generates a random image URL
        ];
    }
}
