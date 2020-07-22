<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\CartIngriedent;

class Ingriedent extends Model
{
    protected $fillable = array('name', 'type');

    public function ingriedentCartIngriedents() {
        return $this->hasMany(CartIngriedent::class, 'ingriedent_id', 'id');
    }
}