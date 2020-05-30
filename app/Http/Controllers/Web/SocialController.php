<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use App\Models\Customer;
use Socialite;
use Auth, URL, Session, Redirect;

class SocialController extends Controller
{
     public function redirect($social)
    {
    	if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }
        // else{
        //     if(URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        // }
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $data = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);

        if(isset($data['status'])){
        	return redirect()->route('home')->with('danger','Tài khoản này đã được sử dụng trong đăng nhập bằng hình thức khác! Vui lòng kiểm tra lại!');
        }

        Auth::guard('customer')->login($data['customer']);

        return Redirect::to(Session::get('pre_url'))->with('success','Đăng nhập thành công!');
    }
}
