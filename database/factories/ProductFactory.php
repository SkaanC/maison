<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'price' => $faker->randomDigit(),
            'size' => $faker->randomElement($array = ['46','48','50','52']),
            'status' => $faker->randomElement($array = ['publie','brouillon']),
            'code' => $faker->randomElement($array = ['solde','new']),
            'reference' => $faker->regexify('[A-Z0-9]{3,10}')
    ];
});
