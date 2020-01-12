<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jobopening;
use Faker\Generator as Faker;

$factory->define(Jobopening::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'requirements' => $faker->sentences(rand(1, 10), true),
        'responsibilities' => $faker->sentences(rand(1, 10), true),
        'extra' => $faker->sentences(rand(1, 10), true),
        'conditions' => $faker->sentences(rand(1, 10), true),
    ];
});
