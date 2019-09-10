<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_Post extends Model
{
    //this function declare to OnetoMany Relationship
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
