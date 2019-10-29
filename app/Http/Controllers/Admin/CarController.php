<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Excel;
use DataTables;

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
    public function import(){
         if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $begin_row = $request->begin_row;
            $end_row = $request->end_row;
            $update_exist = $request->check_update_exist;
            $update_count = 0;
            $insert_count = 0;
            DB::beginTransaction();
            try {
                $data = \Excel::load($path)->get();
                // dd($data);
                if($data->count()){
                    $count = $data->count();
                    foreach ($data as $key => $value) {
                        if($key>= $begin_row && $key <= $end_row){
                            //CHECK EXIST CUSTOMER
                            $check_exist = PosCustomer::where('customer_place_id',$this->getCurrentPlaceId())
                                            ->where('customer_phone', $value->customer_phone)->first();
                             
                            if(isset($check_exist)){
                                // echo 0;
                                if($update_exist =="on"){
                                    // return "update";
                                    $customertag = PosCustomertag::where('customertag_place_id',$this->getCurrentPlaceId())
                                                        ->where('customertag_name',$value->customertag_name)->first();

                                    $check_id= PosCustomer::where('customer_phone', $value->customer_phone)->first()->customer_id;
                                    $pos_cus=PosCustomer::where('customer_place_id',$this->getCurrentPlaceId())
                                            ->where('customer_phone', $value->customer_phone)
                                            ->where('customer_id',$check_id)
                                            ->update(['customer_customertag_id'=>$customertag->customertag_id , 
                                                'customer_fullname'=>$value->customer_fullname,
                                                'customer_gender'=>$value->customer_gender,
                                                'customer_phone'=>$value->customer_phone,
                                                'customer_country_code'=>$value->customer_country_code,
                                                'customer_email'=>$value->customer_email,
                                                'customer_birthdate'=>format_date_db($value->customer_birthdate),
                                                'customer_address'=>$value->customer_address
                                    ]);
                                    $update_count++;

                                    // dd($pos_cus);
                                            
                                }
                            }
                            else
                            {
                                $customertag = PosCustomertag::where('customertag_place_id',$this->getCurrentPlaceId())
                                                        ->where('customertag_name',$value->customertag_name)->first();
                                                        // dd($customertag);
                                $idCustomer = PosCustomer::where('customer_place_id','=',$this->getCurrentPlaceId())->max('customer_id') +1;
                                $PosCustomer = new PosCustomer();
                                $PosCustomer->customer_id = $idCustomer;
                                $PosCustomer->customer_place_id = $this->getCurrentPlaceId();
                                $PosCustomer->customer_customertag_id = $customertag->customertag_id;
                                $PosCustomer->customer_fullname = $value->customer_fullname;
                                $PosCustomer->customer_gender = $value->customer_gender;
                                $PosCustomer->customer_phone = $value->customer_phone;
                                $PosCustomer->customer_country_code = $value->customer_country_code;
                                $PosCustomer->customer_email = $value->customer_email;
                                $PosCustomer->customer_birthdate = format_date_db($value->customer_birthdate);
                                $PosCustomer->customer_address = $value->customer_address;
                                $PosCustomer->save();
                                $insert_count++;
                            }
                        }    
                    }
                    DB::commit();
                    $request->session()->flash('message', 'Import File Success , updated:'.$update_count.' row, inserted:'.$insert_count.' row');
                    return back();

                }
                else{
                    $request->session()->flash('error', 'Import File Not Data');
                    return back();
                }
            } catch (\Exception $e) {
               // dd(1);
                DB::rollback();
                $request->session()->flash('error', 'Import File is Error! Please check import file again!');
                return back();
            }

        }
        else{
            $request->session()->flash('error', 'Please choose file import.');
            return back();
        }
    }
}
