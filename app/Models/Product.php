<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\CartProduct;
use App\Models\ProductCategory;
use App\Models\ProductTag;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'sale', 'description'];

    protected $attributes = [
        'price'       => 0,
        'sale'        => 'no',
        'description' => 'none',
    ];

    public function productImages() {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function productCartProducts() {
        return $this->hasMany(CartProduct::class, 'product_id', 'id');
    }

    public function productProductCategories() {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function productProductTags() {
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }
}