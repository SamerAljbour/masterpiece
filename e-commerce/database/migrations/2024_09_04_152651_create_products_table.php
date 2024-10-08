<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('total_stock');
            $table->foreignId('seller_id')->constrained(); // Ensure this table exists
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key for categories
            // $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade'); // Foreign key reference

            $table->text('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
