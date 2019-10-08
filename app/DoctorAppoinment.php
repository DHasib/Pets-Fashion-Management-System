<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAppoinment extends Model
{
    protected $fillable = [
        'category_id', 'user_id', 'pet_problem','problem_notice_date','pet_age', 'doctor_visit_date','status',
    ];
    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
