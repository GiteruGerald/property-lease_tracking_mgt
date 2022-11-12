<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties');

            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->date('start');//Lease Term in years
            $table->integer('duration');//Lease Term in years
            $table->integer('rent');
            $table->integer('deposit');
            $table->string('type'); //Gross Lease/Net Lease/ Modified Gross Lease/Percentage Lease

// Check out types of leases on https://www.squarefoot.com/leasopedia/different-types-of-commercial-leases/

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
        Schema::dropIfExists('leases');
    }
}
