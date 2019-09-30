<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  

    protected $fillable = [
        'user_id','about','youtube','facebook','user_img'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
 
    
}
