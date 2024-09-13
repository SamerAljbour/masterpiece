<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        // Define a larger array of e-commerce categories
        $categories = [
            'clothes',
            'food',
            'electronics',
            'home appliances',
            'furniture',
            'books',
            'sports',
            'beauty and health',
            'toys',
            'automotive',
            'jewelry',
            'shoes',
            'bags',
            'stationery',
            'gaming',
            'music instruments',
            'garden supplies',
            'pet supplies',
            'tools',
            'watches'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories), // Picks one of the predefined categories
        ];
    }
}
