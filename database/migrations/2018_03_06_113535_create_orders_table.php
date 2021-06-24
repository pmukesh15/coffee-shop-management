<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('email');
            $table->integer('customer_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('quantity');
            $table->double('total');
            $table->boolean('status');
            $table->foreign('customer_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
