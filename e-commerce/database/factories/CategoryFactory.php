<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    // Static variable to keep track of the current index
    private static $currentIndex = 0;

    public function definition(): array
    {
        // Define a larger array of e-commerce categories
        $categories = [
            'Furniture',
            'Kitchen',
            'Lighting',
            'Monitors',
            'Computers',
            'Laptops',
            'Food',
        ];

        // Get the category name based on the current index
        $categoryName = $categories[self::$currentIndex];

        // Increment the index, and reset if it exceeds the categories count
        self::$currentIndex = (self::$currentIndex + 1) % count($categories);

        return [
            'name' => $categoryName, // Picks the category name based on the current index
        ];
    }
}
