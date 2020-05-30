<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
    	'customer_id', 'name', 'phone' ,'title', 'content', 'active'
    ];

    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
