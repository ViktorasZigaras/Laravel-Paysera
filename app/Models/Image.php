<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    protected $fillable = ['product_id', 'sequence', 'name', 'alt'];

    protected $attributes = [
        'sequence' => 0,
        'name'     => '',
        'alt'      => '',
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}