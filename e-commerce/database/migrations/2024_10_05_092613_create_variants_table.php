<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Size, Color
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
