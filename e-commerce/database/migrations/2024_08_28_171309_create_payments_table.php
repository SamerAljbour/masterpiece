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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Reference to the order
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('payment_method'); // Payment method (e.g., credit card, PayPal)
            $table->string('transaction_id')->unique(); // Unique transaction identifier
            $table->enum('status', ['pending', 'completed', 'failed']); // Payment status
            $table->enum('type', ['credit_card', 'paypal']);

            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
