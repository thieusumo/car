<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

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
    public static function countNotificationAdmin()
    {
        return self::where('active',0)->get();
    }
    public static function countNotificationCustomer()
    {
        return self::where([['receiver_id',Auth::guard('customer')->user()->id],['active',0]])->get();
    }
}
