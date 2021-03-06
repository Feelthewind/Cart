<?php

use App\Models\Address;
use Faker\Generator as Faker;
use App\Models\Country;
use App\Models\User;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address_1' => $faker->streetAddress,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'country_id' => factory(Country::class)->create()->id,
        'user_id' => factory(User::class)->create()->id
    ];
});
