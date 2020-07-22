<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartIngriedent;

class Ingriedent extends Model
{
    protected $fillable = ['name', 'type'];

    public function ingriedents() {
        return $this->hasMany(CartIngriedent::class, 'ingriedent_id', 'id');
    }
}