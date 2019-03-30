<?php

use Faker\Generator as Faker;
use App\Models\PaymentMethod;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'card_type' => 'Visa',
        'last_four' => '4242',
        'provider_id' => str_random(10),
    ];
});
