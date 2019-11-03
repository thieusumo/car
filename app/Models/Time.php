<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = "times";
    protected $fillable = ['time_go','time_back','car_id'];
}
