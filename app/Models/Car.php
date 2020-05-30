<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
    	'name', 'slug', 
        'station_go', 'station_back',
    	'time_go','time_back',
    	'route_id','line',
    	'phone','address',
    	'active',
        'car_type',
        'stars', 'total_star',
        'customer_id',
        'license_plate', //Biển số
        'description'
    ];

    public function scopeActive($query){
    	return $query->where('active',1);
    }
    public function getTypeCar(){
        return $this->belongsTo(TypeCar::class,'car_type','id');
    }
    public function getRoute(){
        return $this->belongsTo(Route::class,'route_id','id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
