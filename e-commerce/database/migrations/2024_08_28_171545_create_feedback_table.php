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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Reference to the product
            $table->text('comment'); // Feedback comment
            $table->unsignedTinyInteger('rating'); // Feedback rating (1 to 5)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
