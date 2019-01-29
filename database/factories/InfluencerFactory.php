<?php

use Faker\Generator as Faker;

$factory->define(App\Influencer::class, function (Faker $faker) {
    static $number = 6;

    return [
        'user_id' => $number++,
        'username' => $faker->userName,
        'followers' => $faker->numberBetween(200, 1000000),
        'media_count' => $faker->numberBetween(10, 250)
    ];
});