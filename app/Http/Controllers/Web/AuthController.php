<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistryRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\CustomerRepository;
use App\Models\Customer;
use Auth;
use Hash;

class AuthController extends Controller
{
	protected $customer;

	public function __construct(CustomerRepository $customer)
	{
		$this->customer = $customer;
	}
    public function login(LoginRequest $request){
    	$input = $request->all();

        $customer = Customer::where('email',$input['customer']['email'])->first();

        if(Hash::check($input['customer']['password'],$customer->password) )
        {
            Auth::guard('customer')->login($customer);

        }else{
            $request->session()->flash('customer_email',$input['customer']['email']);
            $request->session()->flash('error_login','Email hoặc Mật Khẩu đăng nhập không chính xác');
        }
        return back();
    }
    public function registry(RegistryRequest $request)
    {
    	$input = $request->all();

    	$result = $this->customer->store($input);

    	if(!$result){	}
    	else{
    		Auth::guard('customer')->login($result);
    	}
    	return redirect()->back();
    }
    public function logout(){

        Auth::guard('customer')->logout();
        
        return redirect()->route('home');
    }
}
