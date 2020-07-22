<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingriedent extends Model
{
    protected $fillable = array('name', 'type');

    public function ingriedentCartIngriedents() {
        return $this->hasMany(CartIngriedent::class, 'ingriedent_id', 'id');
    }
}