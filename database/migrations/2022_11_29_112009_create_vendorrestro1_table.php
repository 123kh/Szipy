<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorrestro1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorrestro1', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Mobile_No');
            $table->string('Address');
            $table->string('E-mail');
            $table->string('PAN');
            $table->string('Bank_Name');
            $table->string('Account_No');
            $table->string('IFSC_code');
            $table->string('Shed_Size');
            $table->string('Capacity');
            $table->string('Distance');
            $table->string('Geo_Location');
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
        Schema::dropIfExists('vendorrestro1');
    }
}
