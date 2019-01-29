<?php

use Faker\Generator as Faker;

$factory->define(App\Opening::class, function (Faker $faker) {
    static $increment = 0;
    static $day = -1;

    $day++;

    if ($day == 7)
    {
        $increment++;
        $day = 0;
    }

    return [
        'day' => $day,
        'restaurant_id' => $increment,
        'open_morning' => $faker->boolean,
        'open_time_morning' => $faker->time(),
        'close_time_morning' => $faker->time(),
        'open_lunch' => $faker->boolean,
        'open_time_lunch' => $faker->time(),
        'close_time_lunch' => $faker->time(),
        'open_diner' => $faker->boolean,
        'open_time_diner' => $faker->time(),
        'close_time_diner' => $faker->time(),
    ];
});
