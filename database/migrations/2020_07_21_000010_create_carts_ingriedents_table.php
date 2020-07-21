<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsIngriedentsTable extends Migration
{
    public function up()
    {
        Schema::create('carts_ingriedents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('ingriedent_id');
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('ingriedent_id')->references('id')->on('ingriedents');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts_ingriedents');
    }
}