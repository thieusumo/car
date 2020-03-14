<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCar extends Model
{
    protected $table = "type_cars";
    protected $fillable = [
    	'id',
    	'name',
    	'slug',
    	'active'
    ];

    public $timestamps = true;
    public function scopeActive($query){
    	return $query->where('active',1);
    }

}
