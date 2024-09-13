<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Role;

class CategoryAndRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 categories
        Category::factory()->count(20)->create();

        // Create the 3 predefined roles (Customer, Seller, Admin)
        Role::factory()->count(3)->create();
    }
}
