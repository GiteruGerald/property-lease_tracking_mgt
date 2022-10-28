<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
       
    ];
});
