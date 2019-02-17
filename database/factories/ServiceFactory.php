<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {

    static $number = -1;

    $number++;

    $kitchens = ['Wifi', 'Can be privatized', 'Pet allowed', 'Karaoke', 'Valet parking', 'Apple Pay', 'Bar', 'Air-conditioning', 'Credit card', 'Wheelchair Accessible'];
    $slugs = ['wifi', 'can_be_privatized', 'pet_allowed', 'karaoke', 'valet_parking', 'apple_pay', 'bar', 'air_conditioning', 'credit-card', 'wheelchair_accessible'];

    return [
        'label' => $kitchens[$number],
        'slug' => $slugs[$number]
    ];
});
