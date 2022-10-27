<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'category' => Str::random(10),
        'type' => Str::random(10),
        'location_id' => $this->faker->randomDigit,
        'price/value' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'description' =>$this->faker->words,
    ]; 
});
