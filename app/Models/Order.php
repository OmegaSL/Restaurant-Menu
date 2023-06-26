<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'name',
        'email',
        'phone',
        'address',
        'total_amount',
        'delivery_fee',
        'discount',
        'tax',
        'status',
        'payment_method',
        'delivery_address',
        'delivery_time'
    ];

    /**
     * Get all of the order_lists for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_lists(): HasMany
    {
        return $this->hasMany(OrderList::class);
    }
}
