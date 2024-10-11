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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('store_name');
            $table->enum('location', [
                'Amman',
                'Irbid',
                'Zarqa',
                'Aqaba',
                'Ma’an',
                'Karak',
                'Tafileh',
                'Ajloun',
                'Jerash',
                'Mafraq',
                'Salt',

            ])->nullable();
            $table->text('store_description')->nullable();
            $table->text("store_thumbnail")->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->boolean("is_setup")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
