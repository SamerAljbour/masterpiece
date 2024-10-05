<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('variant_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variant_id')->constrained()->onDelete('cascade'); // Links to `variants` table
            $table->string('value'); // e.g., Small, Medium, Red, Blue
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variant_options');
    }
}
