<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'cart_item_id',
        'quantity',
        'subtotal',
    ];

    /**
     * Get the payment that owns the PaymentItem.
     */
    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }

    /**
     * Get the cart item that is associated with the PaymentItem.
     */
    public function cartItem()
    {
        return $this->belongsTo(CartItems::class, 'cart_item_id', 'id');
    }
}
