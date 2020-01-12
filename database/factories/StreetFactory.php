<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Street;
use Faker\Generator as Faker;

$factory->define(Street::class, function (Faker $faker) {
    return [
        'title' => $faker->streetName,
        'published' => true
    ];
});
