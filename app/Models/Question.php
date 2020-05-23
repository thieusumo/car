<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
    	'customer_id', 'car_id', 'question', 'active'
    ];

    public function scopeActive($query)
    {
    	return $query->where('active',1);
    }
    public function answer()
    {
    	return $this->hasOne(Answer::class,'question_id','id');
    }
}
