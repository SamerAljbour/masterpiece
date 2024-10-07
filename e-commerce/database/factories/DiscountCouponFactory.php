<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DiscountCoupon;

class DiscountCouponFactory extends Factory
{
    protected $model = DiscountCoupon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(2, 3),

            'code' => strtoupper($this->faker->bothify('DISCOUNT-####')), // Generates a code like DISCOUNT-1234
            'discount_amount' => $this->faker->randomFloat(2, 5, 50), // Random discount amount between 5 and 50
            'type' => $this->faker->randomElement(['percentage', 'fixed']), // Randomly selects 'percentage' or 'fixed'
            'valid_from' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'), // Date in the past month
            'valid_until' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Date in the next month
            'is_active' => $this->faker->boolean(80), // 80% chance of being true
        ];
    }
}
