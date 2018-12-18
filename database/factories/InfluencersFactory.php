<?php

use Faker\Generator as Faker;

$factory->define(App\Influencer::class, function (Faker $faker) {
    static $number = 6;

    return [
        'user_id' => $number++
    ];
});
