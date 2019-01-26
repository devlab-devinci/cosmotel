<?php

use Faker\Generator as Faker;

$factory->define(App\Influencer::class, function (Faker $faker) {
    static $number = 6;

    return [
        'user_id' => $number++,
        'username' => 'justToFile',
        'followers' => rand(20000, 100000),
        'media_count' => rand(200, 1000)
    ];
});
