<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'img_path' => $faker->title,
        'price' => $faker->randomDigit,
        'stock' => $faker->randomDigit,
        'comment' => $faker->text
    ];
});
