<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';
    protected $fillable = ['time_go','time_back','car_id'];
}
