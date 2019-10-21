<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class LikeBlog extends Model
{
    protected $fillable = [
        'blog_id','user_id'
    ];

    public function BlogPost()
    {
        return $this->belongsTo('App\BlogPost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}
