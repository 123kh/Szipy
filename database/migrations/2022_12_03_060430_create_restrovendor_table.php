<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestrovendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restrovendor', function (Blueprint $table) {
            $table->id();
            $table->string('Restro_Name');
            $table->string('Address');
            $table->int('Contact_No')|max(10);
            $table->string('City');
            $table->string('Restro_Image');
            $table->string('Password');
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
        Schema::dropIfExists('restrovendor');
    }
}
