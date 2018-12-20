<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->words(2, true),
        'price' => $faker->randomFloat(2, 0.1, 200),
        'currency' => $faker->currencyCode,
        'product_category_id' => $faker->numberBetween(1, 5),
        'restaurant_id' => $faker->numberBetween(1, 7)
    ];
});