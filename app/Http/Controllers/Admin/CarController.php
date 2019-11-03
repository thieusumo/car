<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Excel;
use DataTables;
use DB;
use Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Car $model)
    {
        $data['car_list'] = $model->active()->paginate(1);
        return view('admin.car.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function datatable(Request $request){
        
        $car_list = Car::all();

        return DataTables::of($car_list)
            ->make(true);
    }
    public function getDownload()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/file/template-car.xlsx";

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::download($file, 'template-car.xlsx', $headers);
    }
    public function import(Request $request){
         if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $begin_row = $request->begin_row;
            $end_row = $request->end_row;
            $update_exist = $request->check_update_exist;
            $update_count = 0;
            $insert_count = 0;

            try {
                $data = Excel::load($path)->get();
                // dd($data);
                if($data->count()){

                    $count = $data->count();
                    $car_arr = [];

                    foreach ($data as $key => $value) {
                        if($key>= $begin_row && $key <= $end_row){

                            $check_count = Car::where([['name',$value->name],['route_id',$value->route_id]])->count();

                            if($check_count == 0){
                                $car_arr[] = [
                                    'name' => $value->name,
                                    'slug'=> str_slug($value->name),
                                    'station_go' => $value->station_go,
                                    'station_back' => $value->station_back,
                                    'station_back' => $value->station_back,
                                    'time_go' => $value->time_go,
                                    'time_back' => $value->time_back,
                                    'route_id' => $value->route_id,
                                    'line' => $value->line,
                                    'phone' => $value->phone,
                                    'address' => $value->address,
                                    'active' => 1,
                                ];

                                $insert_count++;
                            }
                                
                        }    
                    }
                    $car_insert = Car::insert($car_arr);
                    if(!isset($car_insert))
                        return responseError();
                    else
                        return responseSuccess();

                }
                else{
                    return response(['status'=>'error','message'=>'Empty File!']);
                }
            } catch (\Exception $e) {
                return responseError();
            }

        }
        else{
            return responseError();
        }
    }
}
