<?php

use Faker\Generator as Faker;

$factory->define(App\Discount::class, function (Faker $faker) {
    return [
        'restaurant_id' => $faker->numberBetween(1, 7),
        'discount' => $faker->randomFloat(2, 0, 1),
        'subscribers' => $faker->numberBetween(1, 10000000),
        'stories' => $faker->numberBetween(0, 10),
        'posts' => $faker->numberBetween(0, 10),
    ];
});