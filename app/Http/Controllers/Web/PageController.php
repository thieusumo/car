<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
    	return view('frontend.pages.home');
    }
    public function page($slug){
        return view('frontend.pages.'.$slug);
    }
    public function carType($type){
        $data['type'] = $type;
        return view('frontend.pages.car-type',$data);
    }

}
