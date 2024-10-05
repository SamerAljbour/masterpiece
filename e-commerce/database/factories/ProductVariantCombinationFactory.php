<?php

namespace Database\Factories;

use App\Models\ProductVariantCombination;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantCombinationFactory extends Factory
{
    protected $model = ProductVariantCombination::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'variant_options' => json_encode([
                'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
                'color' => $this->faker->randomElement(['Red', 'Blue', 'Green']),
            ]),
            'stock' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
