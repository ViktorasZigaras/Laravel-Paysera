<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    protected $fillable = ['name', 'surname', 'address', 'phone'];

    public function orders() {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}