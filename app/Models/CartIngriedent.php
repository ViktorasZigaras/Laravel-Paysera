<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Ingriedent;

class CartIngriedent extends Model
{
    protected $fillable = ['cart_id', 'ingriedent_id'];

    public function cart () {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function ingriedent() {
        return $this->belongsTo(Ingriedent::class, 'ingriedent_id', 'id');
    }
}