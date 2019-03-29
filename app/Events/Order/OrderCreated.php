<?php

namespace App\Events\Order;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Order;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
