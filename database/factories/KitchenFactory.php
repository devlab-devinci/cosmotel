<?php

use Faker\Generator as Faker;

$factory->define(App\Kitchen::class, function (Faker $faker) {

    static $number = -1;

    $number++;

    $kitchens = ['Francais', 'Indien', 'Sushi', 'Japonais', 'Libanais', 'Grec', 'Korean', 'Italien', 'Pizza', 'Burger'];
    $slugs = ['francais', 'indien', 'sushu', 'japonais', 'libanais', 'grec', 'korean', 'italien', 'pizza', 'burger'];

    return [
        'label' => $kitchens[$number],
        'slug' => $slugs[$number]
    ];
});
