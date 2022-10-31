<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Property;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Property::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'category' => $faker->word,
        'type' => $faker->word,
        'location_id' => $this->faker->randomDigit,
        'value' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'description' =>$this->faker->words(7, true),
    ]; 
});
