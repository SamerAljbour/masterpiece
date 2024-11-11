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
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('code')->unique(); // Unique coupon code
            $table->boolean('with_on_sale'); // this to specify if the discount copon can be used with product that have already onsale
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->decimal('discount_amount', 10, 2); // Discount amount
            // $table->enum('type', ['percentage', 'fixed']); // Discount type (percentage or fixed)
            $table->date('valid_from'); // Start date of validity
            $table->date('valid_until')->nullable(); // Allow NULL values
            $table->boolean('is_active')->default(true); // Coupon status
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_coupons');
    }
};
