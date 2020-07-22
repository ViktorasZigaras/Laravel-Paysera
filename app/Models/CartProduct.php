<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;

class CartProduct extends Model
{
    protected $fillable = ['cart_id', 'product_id'];

    public function cart () {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}