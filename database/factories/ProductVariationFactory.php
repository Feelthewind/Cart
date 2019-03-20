<?php

use Faker\Generator as Faker;
use App\ProductVariation;
use App\Models\Product;

$factory->define(ProductVariation::class, function (Faker $faker) {
    return [
        'product_id' => factory(Product::class)->create()->id,
        'name' => $faker->unique()->name
    ];
});
