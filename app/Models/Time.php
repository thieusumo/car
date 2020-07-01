<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Time extends Model
{
    protected $table = "times";
    protected $fillable = ['car_id','route_type','back','go','all'];
}
