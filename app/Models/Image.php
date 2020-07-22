<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    protected $fillable = array('product_id', 'sequence', 'name', 'alt');

    public function imageProduct() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}