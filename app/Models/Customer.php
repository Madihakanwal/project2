<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\ShippingAddress;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'status'
    ];
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'postal_code' => 'string',
        'status' => 'boolean', // active / inactive
    ];

    /**
     * Orders placed by this customer (if you record `customer_id` on orders).
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Shipping addresses for this customer (if you store `customer_id` on shipping_addresses).
     */
    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id');
    }
}
