<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\House;
use Faker\Generator as Faker;

$factory->define(House::class, function (Faker $faker) {
    return [
        'title' => $faker->buildingNumber
    ];
});
