<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VariantOption;
use App\Models\Variant;

class VariantOptionSeeder extends Seeder
{
    public function run()
    {
        // Get size and color variants
        $sizeVariant = Variant::where('name', 'Size')->first();
        $colorVariant = Variant::where('name', 'Color')->first();

        // Create size options
        VariantOption::create(['variant_id' => $sizeVariant->id, 'value' => 'Small']);
        VariantOption::create(['variant_id' => $sizeVariant->id, 'value' => 'Medium']);
        VariantOption::create(['variant_id' => $sizeVariant->id, 'value' => 'Large']);

        // Create color options
        VariantOption::create(['variant_id' => $colorVariant->id, 'value' => 'Red']);
        VariantOption::create(['variant_id' => $colorVariant->id, 'value' => 'Blue']);
        VariantOption::create(['variant_id' => $colorVariant->id, 'value' => 'Green']);
    }
}
