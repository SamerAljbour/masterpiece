<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariantCombination;

class ProductVariantCombinationSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            // Create multiple product variant combinations for each product
            ProductVariantCombination::create([
                'product_id' => $product->id,
                'variant_options' => json_encode(['size' => 'Small', 'color' => 'Red']),
                'stock' => rand(1, 100),
                'price' => $product->price,
            ]);

            ProductVariantCombination::create([
                'product_id' => $product->id,
                'variant_options' => json_encode(['size' => 'Medium', 'color' => 'Blue']),
                'stock' => rand(1, 100),
                'price' => $product->price,
            ]);

            ProductVariantCombination::create([
                'product_id' => $product->id,
                'variant_options' => json_encode(['size' => 'Large', 'color' => 'Green']),
                'stock' => rand(1, 100),
                'price' => $product->price,
            ]);
        }
    }
}
