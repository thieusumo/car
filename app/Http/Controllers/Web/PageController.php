<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeCar;
use App\Models\Car;
use App\Models\Menu;
use DataTables;


class PageController extends Controller
{
    public function index(){
    	return view('frontend.pages.home');
    }
    public function page($slug,$car_name=""){
        $check_menu = Menu::where([['menu_type','1'],['slug',$slug],['parent_id','!=','0']])->count();

        if($check_menu > 0){
            if($car_name == ""){
                $type_car = TypeCar::active()->where('slug',$slug)->first();
                if(!isset($slug) || $slug == "")
                    return abort('404');
                $data['cars'] = Car::has('getTypeCar')->has('getRoute')->where('car_type',$type_car->id)->paginate(15);
                $data['slug'] = $slug;

                return view('frontend.pages.car-type',$data);
            }
            else{
                return view('frontend.car.car-detail');
            }

                
        }

        if(!is_file(resource_path('views/frontend/pages/'.$slug.'.blade.php')))
            return abort('404');
        return view('frontend.pages.'.$slug);
    }
    public function carType($type){
        return 'ok';
        $type_car = TypeCar::active()->where('slug',$type)->first();
        if(!isset($type_car) || $type_car == "")
            return back()->with('danger',"Can Not Find Type Car");
        $data['cars'] = Car::has('getTypeCar')->has('getRoute')->where('car_type',$type_car->id)->paginate(15);

        return view('frontend.pages.car-type',$data);
    }
    public function datatable(Request $request){
        $cars = Car::where('car_type',1)->where('route_id',$request->route_car)->get();
        return DataTables::of($cars)
        ->addColumn('station',function($row){
            return $row->station_go." - ".$row->station_back;
        })
        ->make(true);
    }

}
