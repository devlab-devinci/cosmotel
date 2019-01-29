<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'influencer_id' => $faker->numberBetween(1, 5),
        'restaurant_id' => $faker->numberBetween(1, 7),
        'discount' => $faker->numberBetween(10, 100),
        'client_count' => $faker->numberBetween(1, 8),
        'dateTime' => new DateTime()
    ];
});