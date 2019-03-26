<?php

namespace Tests\Unit\Models\Addresses;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Address;
use App\Models\Country;
use App\Models\User;

class AddressTest extends TestCase
{
    public function test_it_has_one_country()
    {
        $address = factory(Address::class)->create([
            'user_id' => factory(User::class)->create()->id
        ]);

        $this->assertInstanceOf(Country::class, $address->country);
    }

    public function test_it_belongs_to_a_user()
    {
        $address = factory(Address::class)->create([
            'user_id' => factory(User::class)->create()->id
        ]);

        $this->assertInstanceOf(User::class, $address->user);
    }
}
