<?php

use Faker\Generator as Faker;

$factory->define(App\Kitchen::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true)
    ];
});
