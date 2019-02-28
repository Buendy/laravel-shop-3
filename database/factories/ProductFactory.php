<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(3), 0, -1),
        'description' => $faker->sentence(10),
        'long_description' => $faker->realText(),
        'price' => $faker->randomFloat(2,5,150),
        'category_id' => $faker->numberBetween(1,10),
        'quantity' => $faker->numberBetween(1, 100),
    ];
});
