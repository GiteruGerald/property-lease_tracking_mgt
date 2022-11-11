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

            $table->string('lessee_name');
            $table->string('lessee_email');
            $table->string('lessee_phone');
            $table->date('start_date');//Lease Term in years
            $table->date('end_date');//Lease Term in years
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
