<?php

use Faker\Generator as Faker;
use App\Models\Stock;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'quantity' => 1
    ];
});
