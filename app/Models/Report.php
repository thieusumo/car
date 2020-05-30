<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = [
    	'car_id', 'customer_id', 'content', 'title', 'active', 'contact'
    ];

    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function car()
    {
    	return $this->belongsTo(Car::class,'car_id','id');
    }
}
