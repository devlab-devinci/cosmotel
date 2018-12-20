<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurateur::class, function (Faker $faker) {

    static $number = 1;

    return [
        'user_id' => $number++
    ];
});
