<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Cart\Cart;
use App\Events\Order\OrderCreated;

class OrderController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    public function store(OrderStoreRequest $request, Cart $cart)
    {
        if ($cart->isEmpty()) {
            return response(null, 400);
        }

        $order = $this->createOrder($request, $cart);

        $order->products()->sync($cart->products()->forSyncing());

        event(new OrderCreated($order));
    }

    protected function createOrder(Request $request, Cart $cart)
    {
        return $request->user()->orders()->create(
            array_merge($request->only(['address_id', 'shipping_method_id']), [
                'subtotal' => $cart->subtotal()->amount()
            ])
        );
    }
}
