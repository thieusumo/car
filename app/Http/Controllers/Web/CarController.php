<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use DataTables;
use App\Models\Route;
use App\Models\TypeCar;

class CarController extends Controller
{
    public function edit(){
        $data['routes'] = Route::active()->get();
        $data['type_cars'] = TypeCar::active()->get();

        return view('frontend.car.edit-car',$data);
    }
    public function datatable(Request $request){

        if($request->slug == 'xe-tien-chuyen')
            $cars = Car::where('car_type',2)->get();
        else
            $cars = Car::where('car_type',1)->where('route_id',$request->route_car)->get();
        return DataTables::of($cars)
        ->addColumn('station',function($row){
            return $row->station_go." - ".$row->station_back;
        })
        ->make(true);
    }
    public function save(Request $request){
        return $request->all();
        foreach ($request->more_image as $key => $value) {
            echo $value->getClientOriginalName()."<br>";
        }
        return 'ok';
        // return $request->more->getClientOriginalName();
    }
}
