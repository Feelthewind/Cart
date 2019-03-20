<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scoping\Scoper;

class Product extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithScopes(Builder $builder, $scopes = [])
    {
        return (new Scoper(request()))->apply($builder, $scopes);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
