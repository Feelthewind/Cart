<?php

use Faker\Generator as Faker;
use App\Models\ShippingMethod;
use App\Models\Address;
use App\Models\Order;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'address_id' => factory(Address::class)->create()->id,
        'shipping_method_id' => factory(ShippingMethod::class)->create()->id,
        'subtotal' => 1000
    ];
});
