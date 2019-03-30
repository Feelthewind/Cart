<?php

namespace App\Cart\Payments\Gateways;

use App\Cart\Payments\Gateway;
use App\Models\User;


class StripeGateway implements Gateway
{
  protected $user;

  public function withUser(User $user)
  {
    $this->user = $user;

    return $this;
  }

  public function createCustomer()
  {
    return new StripeGatewayCustomer();
  }
}
