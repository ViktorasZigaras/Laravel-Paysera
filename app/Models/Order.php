<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Cart;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = ['customer_id', 'price', 'status'];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function carts() {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }

    public static function makeOrder(Request $request, $price) {
        $order = new self;
        $order->fillOrder($request, $price);
        return $order;
    }

    private function fillOrder(Request $request, $price) {
        # use autofill??
        $this->customer_id = 1;
        $this->customer_name = $request->name;
        $this->customer_email = $request->email;
        $this->customer_phone = $request->phone;
        $this->price = $price;
        $this->status = 1;
        $this->save();
        return $this;
    }
}