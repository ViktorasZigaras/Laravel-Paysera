<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Tag;

class ProductTag extends Model
{
    protected $fillable = array('product_id', 'tag_id');

    public function productTagProduct () {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productTagCategory() {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}