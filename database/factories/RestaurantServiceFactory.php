<?php

use Faker\Generator as Faker;

$factory->define(App\RestaurantService::class, function (Faker $faker) {
    return [
        'restaurant_id' => $faker->numberBetween(1, 7),
        'service_id' => $faker->numberBetween(1, 10)
    ];
});
