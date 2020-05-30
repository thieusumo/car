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
        $remember = $request->has('remember_me') ? true : false;

        $customer = Customer::where('email',$input['customer']['email'])->first();

        if (Auth::guard('customer')->attempt(['email' => $input['customer']['email'], 'password' => $input['customer']['password']], $remember))
        {
            Auth::guard('customer')->login($customer);
            $request->session()->flash('success','Đăng nhập thành công!');

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

    	if(!$result){}
    	else{
    		Auth::guard('customer')->login($result);
            $request->session()->flash('success','Đăng nhập thành công!');
    	}
    	return back();
    }
    public function logout(){

        Auth::guard('customer')->logout();
        
        return redirect()->route('home');
    }
}
