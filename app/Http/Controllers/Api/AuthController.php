<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;

class AuthController extends Controller
{
	protected $customer;

	public function __construct(
		CustomerRepository $customer
	){
		$this->customer = $customer;
	}
    
}
