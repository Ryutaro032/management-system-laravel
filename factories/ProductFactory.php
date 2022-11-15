<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'company_id' => $faker->randomDigit,
        'product_name' => $faker->name,
        'price' => $faker->randomDigit,
        'stock' => $faker->randomDigit,
        'comment' => $faker->text,
        'company_name' => $faker->company
    ];
});
