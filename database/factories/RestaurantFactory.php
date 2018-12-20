<?php

use Faker\Generator as Faker;
use App\Restaurateur;
use App\Restaurant;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'label' => substr($faker->sentence(2), 0, -1),
        'restaurateur_id' => Restaurateur::all()->random()->user_id,
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'tags' => substr($faker->sentence(2), 0, -1)
    ];
});
