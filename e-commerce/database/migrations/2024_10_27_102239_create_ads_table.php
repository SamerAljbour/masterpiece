<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // To associate the ad with a user
            $table->unsignedBigInteger('product_id')->nullable(); // Nullable product ID for associated product
            $table->enum('status', ['active', 'expired', 'rejected', 'pending'])->default('pending');
            $table->enum('ad_type', ['seller', 'website']); // Ad type: seller or website
            $table->date('ad_from');
            $table->date('ad_to');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
