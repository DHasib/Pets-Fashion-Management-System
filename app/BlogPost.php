<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'blog_title', 'category_id', 'blog_content', 'blog_image', 'slug','user_id','status',
    ];

    protected $dates = ['deleted_at'];
    
    //this function declare to OnetoMany Relationship
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }



}