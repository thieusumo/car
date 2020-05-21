<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    protected $table = "times";
    protected $fillable = ['car_id','route_type','back','go','all'];
}
