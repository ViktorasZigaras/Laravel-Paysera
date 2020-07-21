<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsIngridientsTable extends Migration
{
    public function up()
    {
        Schema::create('carts_ingridients', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('ingridient_id');
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('ingridient_id')->references('id')->on('ingridients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts_ingridients');
    }
}