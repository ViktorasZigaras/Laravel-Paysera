<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class ProductCategory extends Model
{
    protected $fillable = ['product_id', 'category_id'];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}