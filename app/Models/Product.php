<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Product extends Model
{
    protected $fillable = array('title', 'price', 'sale', 'description');

    public function productImages() {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}