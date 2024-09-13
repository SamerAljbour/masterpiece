<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category; // Import Category model

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
        // Retrieve an existing category ID
        $categoryId = Category::inRandomOrder()->first()->id;

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'category_id' => $categoryId, // Use a valid category ID
            'stock_quantity' => $this->faker->numberBetween(1, 100),
            'image_url' => "public/mainProducts/defaultProduct.png",
        ];
    }
}
