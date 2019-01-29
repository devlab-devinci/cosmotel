<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurant::class, function (Faker $faker) {
    return [
        'restaurateur_id' => $faker->numberBetween(1, 5),
        'name' => substr($faker->sentence(2), 0, -1),
        'service_interval' => $faker->numberBetween(30, 90),
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
    ];
});
