<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatOrdereditemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordereditem', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('item_id');
            $table->string('Restro_Id');
            $table->string('Main_Catagory_id');
            $table->string('Item_Name');
            $table->string('Item_Rate_Retail');
            $table->string('Variant');
            $table->double('Flavour');
            $table->string('Item_Image');
            $table->string('Description');
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
        //
    }
}
