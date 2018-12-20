<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'influencer_id' => $faker->numberBetween(1, 5),
        'discount_id' => $faker->numberBetween(1, 15),
        'client_count' => $faker->numberBetween(1, 8),
        'dateTime' => new DateTime()
    ];
});