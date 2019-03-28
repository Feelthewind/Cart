<?php

namespace Tests\Unit\Money;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart\Money;
use Money\Money as BaseMoney;

class MoneyTest extends TestCase
{
    public function test_it_can_get_the_raw_amount()
    {
        $money = new Money(1000);

        $this->assertEquals(1000, $money->amount());
    }

    public function test_it_can_get_the_formatted_amount()
    {
        $money = new Money(1000);

        $this->assertEquals('£10.00', $money->formatted());
    }

<<<<<<< HEAD
    public function test_it_can_add_up()
=======
    public function test_it_can_app_up()
>>>>>>> newone
    {
        $money = new Money(1000);

        $money = $money->add(new Money(1000));

        $this->assertEquals(2000, $money->amount());
    }

    public function test_it_can_return_the_underlying_instance()
    {
        $money = new Money(1000);

<<<<<<< HEAD
        $money = $money->add(new Money(1000));

=======
>>>>>>> newone
        $this->assertInstanceOf(BaseMoney::class, $money->instance());
    }
}
