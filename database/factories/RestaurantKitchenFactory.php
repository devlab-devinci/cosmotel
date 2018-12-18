<?php

use Faker\Generator as Faker;

$factory->define(App\RestaurantKitchen::class, function (Faker $faker) {
    return [
        'restaurant_id' => $faker->numberBetween(1, 7),
        'kitchen_id' => $faker->numberBetween(1, 10)
    ];
});
