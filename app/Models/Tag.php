<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductTag;

class Tag extends Model
{
    protected $fillable = ['title', 'action'];

    public function tags() {
        return $this->hasMany(ProductTag::class, 'tag_id', 'id');
    }
}