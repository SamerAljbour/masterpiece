

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Add this line to link with the categories table
            $table->text('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
