<?php

use Faker\Generator as Faker;

$factory->define(App\Kitchen::class, function (Faker $faker) {
    return [
        'label' => $faker->words(2, true),
        'slug' => $faker->word
    ];
});
