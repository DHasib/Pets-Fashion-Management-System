<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    

    use SoftDeletes;

    protected $fillable = [
        'name', 'category_id', 'title', 'description', 'price','stock','discount', 'image', 'slug',
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
