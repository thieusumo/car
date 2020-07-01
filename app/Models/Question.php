<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
    	'customer_id', 'car_id', 'question', 'active'
    ];

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('H:i:s, m/d/Y');
    }

    public function scopeActive($query)
    {
    	return $query->where('active',1);
    }
    public function answer()
    {
    	return $this->hasOne(Answer::class,'question_id','id');
    }
    public function questioner()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public static function countQuestionAdmin()
    {
        return self::where('active',0)->get();
    }
}
