<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_type', // 'percentage' or 'fixed'
        'discount_value',
        'start_date',
        'end_date',
        'min_order_amount',
        'max_uses',
        'status',
    ];
    protected $casts = [
        'code' => 'string',
        'discount_type' => 'string',      // 'percentage' | 'fixed'
        'discount_value' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'min_order_amount' => 'decimal:2',
        'max_uses' => 'integer',
        'status' => 'boolean',     // active / inactive
    ];

    /**
     * Orders that used this coupon (if your orders table has a `coupon_id`).
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }
}
