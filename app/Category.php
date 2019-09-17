<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

//this function declare to OnetoMany Relationship..............
    public function blogPosts()
    {
        return $this->hasMany('App\BlogPost');
    }

    public function pets()
    {
        return $this->hasMany('App\Pet');
    }
}
