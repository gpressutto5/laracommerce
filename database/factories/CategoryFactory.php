<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $word = $faker->word,
        'slug' => $word,
    ];
});
