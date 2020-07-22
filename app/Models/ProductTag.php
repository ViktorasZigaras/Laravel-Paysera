<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Tag;

class ProductTag extends Model
{
    protected $fillable = ['product_id', 'tag_id'];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}