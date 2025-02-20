<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingOption extends Model
{
    use HasFactory;

    protected $table = 'shipping_options';

    /**
     * Get the shipping that owns the ShippingOption.
     */
    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Shipping::class, 'shipping_id', 'id');
    }
}
