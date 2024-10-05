<?php

namespace Database\Factories;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantFactory extends Factory
{
    protected $model = Variant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Size', 'Color']),
        ];
    }
}
