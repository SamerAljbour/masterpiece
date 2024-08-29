<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscountCoupon;

class DiscountCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 fake DiscountCoupon records
        DiscountCoupon::factory()->count(10)->create();
    }
}
