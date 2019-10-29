<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
    	'name',
    	'slug',
    	'station_go',
    	'station_back',
    	'time_go',
    	'time_back',
    	'route_id',
    	'line',
    	'phone',
    	'address',
    	'active'
    ];

    public function scopeActive($query){
    	return $query->where('active',1);
    }
}
