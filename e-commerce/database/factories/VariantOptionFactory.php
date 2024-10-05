<?php

namespace Database\Factories;

use App\Models\VariantOption;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantOptionFactory extends Factory
{
    protected $model = VariantOption::class;

    public function definition()
    {
        return [
            'variant_id' => Variant::factory(),
            'value' => $this->faker->randomElement(['Small', 'Medium', 'Large', 'Red', 'Blue', 'Green']),
        ];
    }
}
