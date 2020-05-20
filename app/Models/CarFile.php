<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarFile extends Model
{
    protected $table = "car_files";
    protected $filable = [
    	'car_id',
    	'image_src',
    	'type', // 1: own, 2: customer
    	'active' 
    ];
}
