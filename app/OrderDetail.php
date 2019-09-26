<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $fillable = [
        'order_list_id', 'payment_details_id', 'order_status'
    ];
    
    
    public function orderList()
    {
        return $this->belongsTo('App\OrderList');
    }


    public function paymentDetails()
    {
        return $this->belongsTo('App\PaymentDetail');
    }
}
