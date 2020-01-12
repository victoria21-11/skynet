<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->words(rand(1, 10), true),
        'description' => $faker->sentences(rand(1, 10), true),
    ];
});
