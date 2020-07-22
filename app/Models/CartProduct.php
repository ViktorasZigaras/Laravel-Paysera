<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;

class CartProduct extends Model
{
    protected $fillable = array('cart_id', 'product_id');

    public function cartProductCart () {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function cartProductProduct() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}