<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';
    protected $fillable = ['name','route','active'];

    public function scopeActive($query){
    	return $query->where('active',1);
    }
}
