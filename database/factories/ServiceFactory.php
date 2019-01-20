<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'label' => $faker->word,
        'slug' => $faker->word
    ];
});
