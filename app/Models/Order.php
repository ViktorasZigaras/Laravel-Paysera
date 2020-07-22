<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Cart;

class Order extends Model
{
    protected $fillable = array('customer_id', 'sum', 'status');

    public function orderCustomer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function orderCarts() {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}