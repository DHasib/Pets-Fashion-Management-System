<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'PhoneNum','location','password', 'blocked_date', 'role',
    ];
    protected $dates = [
        'blocked_date'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function save(array $options = array()) {
        if(isset($this->remember_token))
            unset($this->remember_token);
    
        return parent::save($options);
    }


    public function profile() 
    {
        return $this->hasOne('App\Profile');
    }

    public function blogPosts()
    {
        return $this->hasMany('App\BlogPost');
    }



}
