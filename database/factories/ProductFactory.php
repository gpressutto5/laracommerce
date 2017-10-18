<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'price' => $faker->randomFloat(2, 0, 500),
        'description' => $faker->paragraph,
        'image' => $faker->image('public/storage/images/products', 640, 480, 'technics', false) ?: $faker->imageUrl(640, 480, 'technics'),
        'category_id' => $faker->numberBetween(1, 28),
    ];
});
