<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Category extends Model
{
    protected $fillable = array('title', 'parent');

    public function categoryProductCategorys() {
        return $this->hasMany(ProductCategory::class, 'category_id', 'id');
    }
}