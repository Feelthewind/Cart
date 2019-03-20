<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;

class Category extends Model
{
    use HasChildren, IsOrderable;

    protected $fillable = [
        'name',
        'slug',
        'order'
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
