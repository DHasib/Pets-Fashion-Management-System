<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{


    protected $fillable = [
        'quentity', 'total_price', 'type', 'item_id',
    ];
    
    public function pets()
    {
        return $this->BelongsTo('App\Pet');
    }

    public function products()
    {
        return $this->BelongsTo('App\Product');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
 
}
