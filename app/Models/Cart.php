<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\CartIngriedent;
use App\Models\CartProduct;

class Cart extends Model
{
    protected $fillable = ['order_id'];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function ingriedents() {
        return $this->hasMany(CartIngriedent::class, 'cart_id', 'id');
    }

    public function products() {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }

    public static function makeCart($cartProducts, Order $order) {
        foreach ($cartProducts as $product) {
            $orderCart = new self;
            $orderCart->product_id = $product->id;
            $orderCart->order_id = $order->id;
            $orderCart->save();
        }
    }
}