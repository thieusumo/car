<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeCar;
use App\Models\Car;

class PageController extends Controller
{
    public function index(){
    	return view('frontend.pages.home');
    }
    public function page($slug){
        return view('frontend.pages.'.$slug);
    }
    public function carType($type){
        $type_car = TypeCar::active()->where('slug',$type)->first();
        if(!isset($type_car) || $type_car == "")
            return back()->with('danger',"Can Not Find Type Car");
        $data['cars'] = Car::has('getTypeCar')->has('getRoute')->where('car_type',$type_car->id)->paginate(15);

        return view('frontend.pages.car-type',$data);
    }

}
