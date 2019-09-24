<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'category_id', 'title', 'description', 'price','stock','discount', 'image', 'slug', 'gender',
    ];

    protected $dates = ['deleted_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orderlist()
    {
        return $this->hasMany('App\OrderList');
    }


}

