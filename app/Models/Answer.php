<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = [
    	'customer_id', 'question_id', 'answer'
    ];

    // public function getUpdatedAtAttribute($date)
    // {
    // 	return \Carbon\Carbon::parse($date)->format('m/d/Y');
    // }
}
