<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cart\Cart;
use App\Cart\Payments\Gateway;
use App\Exceptions\PaymentFailedException;
use App\Events\Orders\OrderPaymentFailed;

class ProcessPayment implements ShouldQueue
{
  protected $gateway;
  /**
     * Create the event listener.
     *
     * @return void
     */
  public function __construct(Gateway $gateway)
  {
    $this->gateway = $gateway;
  }

  /**j
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
  public function handle(OrderCreated $event)
  {
    $order = $event->order;

    try {
      $this->gateway->withUser($order->user)
        ->getCustomer()
        ->charge(
          $order->paymentMethod,
          $order->total()->amount()
        );

      // event
    } catch (PaymentFailedException $e) {
      event(new OrderPaymentFailed($order));
    }
  }
}
