<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurants::class, function (Faker $faker) {
    return [
        'titre' => substr($faker->sentence(2), 0, -1),
        'adresse' => $faker->address,
        'description' => $faker->paragraph,
        'long' => $faker->longitude,
        'lat' => $faker->latitude,
        'tags' => substr($faker->sentence(2), 0, -1)
    ];
});
