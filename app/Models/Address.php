<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CanBeDefault;

class Address extends Model
{
    use CanBeDefault;

    protected $fillable = [
        'name',
        'address_1',
        'city',
        'postal_code',
        'country_id',
        'default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
