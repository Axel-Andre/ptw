<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traject;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function trajects(){
        return $this->hasMany('App\Traject', 'driver_id');
    }
}
