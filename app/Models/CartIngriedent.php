<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Ingriedent;

class CartIngriedent extends Model
{
    protected $fillable = array('cart_id', 'ingriedent_id');

    public function CartIngriedentCart () {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function CartIngriedentIngriedent() {
        return $this->belongsTo(Ingriedent::class, 'ingriedent_id', 'id');
    }
}