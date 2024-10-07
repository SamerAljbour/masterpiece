<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoryAndRoleSeeder::class,         // 1. Seed categories and roles
            // SubCategorySeeder::class,             // 2. Seed subcategories
            UserSeeder::class,                    // 3. Seed users
            ProductSeeder::class,                 // 4. Seed products
            VariantSeeder::class,                 // 5. Seed variants
            VariantOptionSeeder::class,           // 6. Seed variant options
            ProductVariantCombinationSeeder::class, // 7. Seed product variant combinations
            // DiscountCouponSeeder::class,          // Optional: can be at the end as it's independent
        ]);
    }
}
