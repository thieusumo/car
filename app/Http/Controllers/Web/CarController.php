<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use DataTables;
use App\Models\Route;
use App\Models\TypeCar;
use App\Models\Times;
use DB;
use Carbon\Carbon;

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
    public function search(Request $request){

        $tuyen = $request->tuyen;
        $chieu = $request->chieu;
        $ngay = $request->ngay;
        $gio = $request->gio;

        //Lấy tên tuyến
        $check_tuyen = Route::where('route',$tuyen)->first();
        if(!$check_tuyen){
            $data['name'] = $tuyen;
            $data['slug'] = $tuyen;
        }else{
            $data['name'] = $check_tuyen->name;

            if($chieu == 'di') $return = 'go'; else $return = 'back';

            $data['cars'] = DB::table('times')->join('cars', function($join){
                $join->on('times.route_type','cars.route_id')
                ->on('times.car_id','cars.id');
            })
            ->join('route', function($join){
                $join->on('times.route_type','route.id');
            })
            ->where('route.route',$tuyen);

            if($ngay && $ngay != ""){
                $ngay = Carbon::parse($ngay)->format('d');
                $table = 'times.'.$return;
                $data['cars']->whereDay($return,$ngay);
            }
            if($gio && $gio != "")
                $data['cars']->whereTime('times.'.$return, ">=", Carbon::parse($gio)->subHour(1))
                        ->whereTime('times.'.$return,"<=", Carbon::parse($gio)->addHour(1));
            $data['slug'] = $tuyen;
            $data['cars'] = $data['cars']->paginate(15);

            $data['search_date'] = Carbon::parse($request->ngay)->format('d/m/Y');
            $data['search_clock'] = $gio;
            $data['search_chieu'] = $chieu;
        }

        return view('frontend.pages.list-car',$data);
    }
}
