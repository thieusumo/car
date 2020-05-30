<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notifications";
    protected $fillable = [
    	'send_id', 'receiver_id', 'content', 'href', 'active'
    ];
    public function scopeActive($query)
    {
    	return $query->where('active',0);
    }
    public function customerSend()
    {
    	return $this->belongsTo(Customer::class,'send_id','id');
    }
}
