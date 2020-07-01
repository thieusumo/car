<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use App\Repositories\CarFileRepository;

class ImageController extends Controller
{
    protected $car;
    protected $car_file;

    public function __construct(
        CarRepository $car,
        CarFileRepository $car_file
    ){
        $this->car = $car;
        $this->car_file = $car_file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id = $request->id;
        try{
            if($request->has('ava')){
                $input['ava'] = uploadImage($request->ava,'cars');
                $this->car->update($input, $id);
            }
            if($request->has('more_image')){
                foreach ($request->more_image as $key => $image) {
                    $file_array[] = [
                        'image_src' => uploadImage($image,'cars'),
                        'car_id' => $id
                    ];
                }
                $this->car_file->storeArray($file_array);
            }
            return response(['status'=>'success','message'=>'Successfully!']);

        }catch(\Exception $e){
            \Log::info($e);
            return response(['status'=>'danger','message'=>'Failed!']);
        }

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['car_files'] = $this->car->getOne($id);
        if(!$data['car_files'])
            abort(404);
        $data['id'] = $id;
        return view('admin.car.images',$data);
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
        try{
            $this->car_file->remove($id);
            return response(['status'=>'success','message'=>'Successfully']);
        }catch(Exception $e){
            \Log::info($e);
            return response(['status'=>'danger','message'=>'Failed!']);
        }
        
    }
}
