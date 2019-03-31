<?php

namespace Tests\Unit\Listeners;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart\Cart;
use App\Models\ProductVariation;
use App\Listeners\Order\EmptyCart;
use App\Models\User;
use App\Events\Order\OrderPaymentFailed;
use App\Models\Order;
use App\Listeners\Order\MarkOrderPaymentFailed;

class MarkOrderPaymentFailedListenerTest extends TestCase
{
  /**
     * A basic unit test example.
     *
     * @return void
     */
  public function test_it_marks_order_as_payment_failed()
  {
    $event = new OrderPaymentFailed(
      $order = factory(Order::class)->create([
        'user_id' => factory(User::class)->create()
      ])
    );

    $listener = new MarkOrderPaymentFailed();

    $listener->handle($event);

    $this->assertEquals(Order::PAYMENT_FAILED, $order->fresh()->status);
  }
}
