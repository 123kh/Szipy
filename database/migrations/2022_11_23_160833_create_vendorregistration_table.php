<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorregistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorregistration', function (Blueprint $table) {
            $table->id();
            $table->string('User_Name');
            $table->integer('Em_Id');
            $table->string('Password');
            $table->string('Contact_No');
            $table->double('Latitude');
            $table->double('Longitude');
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
        Schema::dropIfExists('vendorregistration');
    }
}
