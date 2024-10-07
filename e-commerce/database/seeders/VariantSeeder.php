<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variant;

class VariantSeeder extends Seeder
{
    public function run()
    {
        // Create "Size" and "Color" variants
        Variant::create(['name' => 'Size']);
        Variant::create(['name' => 'Color']);
        Variant::create(['name' => 'Material']);
        Variant::create(['name' => 'Type']);
        Variant::create(['name' => 'Resolution']);
        Variant::create(['name' => 'Processor']);
        Variant::create(['name' => 'Flavor']);
    }
}
