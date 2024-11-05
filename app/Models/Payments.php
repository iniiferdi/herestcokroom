<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = ['subtotal', 'total', 'snap_tokens'];

    public function items()
    {
        return $this->hasMany(PaymentItem::class);
    }
}
