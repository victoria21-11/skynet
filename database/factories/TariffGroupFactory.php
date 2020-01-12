<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TariffGroup;
use Faker\Generator as Faker;

$factory->define(TariffGroup::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence(),
    ];
});
