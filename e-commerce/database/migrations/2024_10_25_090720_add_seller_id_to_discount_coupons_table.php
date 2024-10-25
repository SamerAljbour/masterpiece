<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellerIdToDiscountCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->foreignId('seller_id')->nullable()->constrained('sellers')->onDelete('cascade')->after('user_id'); // Add seller_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_coupons', function (Blueprint $table) {
            $table->dropForeign(['seller_id']); // Drop foreign key constraint
            $table->dropColumn('seller_id'); // Remove the seller_id column
        });
    }
}
