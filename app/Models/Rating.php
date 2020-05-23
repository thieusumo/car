<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";

    protected $fillable = [
    	'customer_id','car_id','comment','star','active'
    ];

    public function scopeActive($query)
    {
    	return $query->where('active',1);
    }
    public function customers()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
