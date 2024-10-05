<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantCombinationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_variant_combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Links to `products` table
            $table->json('variant_options'); // Store selected variant options as JSON
            $table->integer('stock'); // Stock for each combination
            $table->decimal('price', 8, 2); // Price for each combination
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variant_combinations');
    }
}
