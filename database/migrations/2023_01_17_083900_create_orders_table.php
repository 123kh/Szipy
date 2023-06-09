<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('order_id');
            $table->integer('restro_id');
            $table->integer('total');
            $table->double('discount');
            $table->string('payment_mode');
            $table->string('address');
            $table->string('delivery_type');
            $table->string('contact');
            $table->string('coupon_code');
            $table->string('assign_delivery');
            $table->integer('user_id');
            $table->string('approval');
            $table->date('order_date');
            $table->string('status');
       
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
