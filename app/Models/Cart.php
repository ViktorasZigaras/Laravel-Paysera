<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\CartIngriedent;
use App\Models\CartProduct;

class Cart extends Model
{
    protected $fillable = array('order_id');

    public function cartOrder() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function cartCartIngriedents() {
        return $this->hasMany(CartIngriedent::class, 'cart_id', 'id');
    }

    public function cartCartProducts() {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }
}