<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category; // Import Category model
use App\Models\Seller; // Import Seller model
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        // Get a random category
        $category = Category::inRandomOrder()->first(); // Ensure this fetches a valid category
        $categoryId = $category ? $category->id : null; // Get the category ID or null if no category

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'total_stock' => $this->faker->numberBetween(0, 100),
            'category_id' => $categoryId, // Link to the main category
            'seller_id' => Seller::inRandomOrder()->first()->id, // Pick a random seller
            'image_url' => "public/mainProducts/defaultProduct.png",
        ];
    }
}
