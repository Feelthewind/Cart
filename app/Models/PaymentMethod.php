<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CanBeDefault;

class PaymentMethod extends Model
{
    use CanBeDefault;

    protected $fillable = [
        'card_type',
        'last_four',
        'provider_id',
        'default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
