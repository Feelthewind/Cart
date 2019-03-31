<?php

namespace Tests\Unit\Listeners;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cart\Cart;
use App\Listeners\Order\EmptyCart;
use App\Models\User;
use App\Events\Order\OrderPaymentFailed;
use App\Models\Order;
use App\Events\Order\OrderPaid;
use App\Listeners\Order\MarkOrderProcessing;

class MarkOrderProcessingListenerTest extends TestCase
{
  /**
     * A basic unit test example.
     *
     * @return void
     */
  public function test_it_marks_order_as_processing()
  {
    $event = new OrderPaid(
      $order = factory(Order::class)->create([
        'user_id' => factory(User::class)->create()
      ])
    );

    $listener = new MarkOrderProcessing();

    $listener->handle($event);

    $this->assertEquals(Order::PROCESSING, $order->fresh()->status);
  }
}

