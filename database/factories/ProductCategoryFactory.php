<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategory::class, function (Faker $faker) {
    static $number = -1;
    static $categories = ['Starter', 'Main course', 'Dessert', 'Wine', 'Coffee'];
    static $categoriesSlug = ['starter', 'main_course', 'dessert', 'wine', 'coffee'];
    $number++;

    return [
        'title' => $categories[$number],
        'slug' => $categoriesSlug[$number]
    ];
});