<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
 
    protected $fillable = [
        'payment_type', 'email', 'received_amount', 'account_id',
    ];
    
    public function orderDetails()
    {
        return $this->hasOne('App\OrderDetail');
    }
}

