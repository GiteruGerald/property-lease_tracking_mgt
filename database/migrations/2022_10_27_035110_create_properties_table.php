<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('type');

            $table->unsignedBigInteger('location_id')->default(0);
            $table->foreign('location_id')->references('id')->on('locations')->nullable();
            
            $table->unsignedBigInteger('value')->default(0);
            $table->string('featured_image')->default('https://picsum.photos/1200/800');
            $table->longText('description')->nullable();

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
        Schema::dropIfExists('properties');
    }
}
