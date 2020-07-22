<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Category extends Model
{
    protected $fillable = ['title', 'parent'];

    public function categories() {
        return $this->hasMany(ProductCategory::class, 'category_id', 'id');
    }
}