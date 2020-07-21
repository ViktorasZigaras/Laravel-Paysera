<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngridientsTable extends Migration
{
    public function up()
    {
        Schema::create('ingridients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('type', 32);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingridients');
    }
}