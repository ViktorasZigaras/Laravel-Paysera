<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->integer('status');
            $table->decimal('price', 5, 2);
            $table->string('customer_name', 100);
            $table->string('customer_email', 100);
            $table->string('customer_phone', 20);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}