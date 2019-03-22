<?php

namespace App\Models\Traits;

use App\Cart\Money;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

trait HasPrice
{
  public function getPriceAttribute($value)
  {
    return new Money($value);
  }

  public function getFormattedPriceAttribute()
  {
    return $this->price->formatted();
  }
}

