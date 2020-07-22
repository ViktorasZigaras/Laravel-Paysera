<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Cart;

class Order extends Model
{
    protected $fillable = ['customer_id', 'sum', 'status'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}