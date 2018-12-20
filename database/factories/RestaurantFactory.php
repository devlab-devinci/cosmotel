<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurant::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'restaurateur_id' => $faker->numberBetween(1, 5)
    ];
});
