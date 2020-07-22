<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductTag;

class Tag extends Model
{
    protected $fillable = array('title', 'action');

    public function tagProductTags() {
        return $this->hasMany(ProductTag::class, 'tag_id', 'id');
    }
}