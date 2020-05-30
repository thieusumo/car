<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class Customer extends Authenticatable
{
	
    protected $table = "customers";

    protected $guard = 'customer';

    public $fillable = [
    	'name','email','password','provider', 'provider_id'
    ];

    protected $hidden = [
    	'password', 'remember_token'
    ];

    public function setPasswordAttribute($password){
    	$this->attributes['password'] = Hash::make($password);
    }
}
