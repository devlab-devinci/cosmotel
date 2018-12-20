<?php

use Faker\Generator as Faker;

$factory->define(App\Discount::class, function (Faker $faker) {
    return [
        'discount_percentage' => $faker->randomFloat(2, 0, 1),
        'minimum_subscribers' => $faker->numberBetween(1, 10000000),
        'minimum_stories' => $faker->numberBetween(0, 10),
        'minimum_posts' => $faker->numberBetween(0, 10),
        'restaurant_id' => $faker->numberBetween(1, 7)
    ];
});