<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Address;

class ValidShippingMethod implements Rule
{
    protected $addressId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($addressId)
    {
        $this->addressId = $addressId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$address = $this->getAddress()) {
            return false;
        }

        return $address->country->shippingMethods->contains('id', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }

    protected function getAddress()
    {
        return Address::find($this->addressId);
    }
}
