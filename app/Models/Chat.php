<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chats";

    protected $fillable = ['send_id','receiver_id','content','active'];

    public function scopeActive()
    {
    	return $this->where('active',1);
    }

    public function sendCustomer()
	{
		return $this->belongsTo(Customer::class, 'send_id','id');
	}
	public function receiverCustomer()
	{
		return $this->belongsTo(Customer::class,'receiver_id','id');
	}
	public static function count()
	{
		return self::where([['receiver_id',\Auth::guard('customer')->user()->id],['active',0]])->count();
	}

}