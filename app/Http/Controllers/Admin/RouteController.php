<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RouteRepository;
use App\Repositories\CarRepository;
use App\Http\Requests\Route\CreateRequest;
use App\Http\Requests\Route\UpdateRequest;
use DataTables;

class RouteController extends Controller
{
    protected $route;
    protected $car;

    public function __construct(
        RouteRepository $route,
        CarRepository $car
    ){
        $this->route = $route;
        $this->car = $car;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['routes'] = $this->route->list();
        return view('admin.route.list');
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
    public function store(CreateRequest $request)
    {
        $input = $request->all();

        $result = $this->route->store($input);

        if(!$result)
            return response(['status'=>'danger','message'=>'Error!']);

        return response(['status'=>'success','message'=>'Successfully!']);
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
    public function update(UpdateRequest $request, $id)
    {
        $input = $request->all();

        $result = $this->route->update($input, $id);

        if(!$result)
            return response(['status'=>'danger','message'=>'Failed']);

        return response(['status'=>'success','message'=>'Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Check cars inside this route
        $cars = $this->car->carInRoute($id);

        if($cars->count() > 0)
            return response(['status'=>'danger','message' => 'Cannot delete! Cars inside Route']);
        try{
            $result = $this->route->remove($id);

            if($result == 'error')
                

            return response(['status' => 'success','message' => 'Successfully!']);

        }catch(\Exception $e){

            \Log::info($e);
            return response(['status'=>'danger','message' => 'Failed!']);
        }
    }
    public function datatable()
    {
        $routes = $this->route->list();

        return DataTables::of($routes)
            ->addColumn('action', function($row){
                return '<a href="javascript:void(0)" class="btn-edit" title=""><i class="tim-icons icon-pencil"></i></a>
                    <a href="javascript:void(0)" class="btn-delete ml-1" title=""><i class="tim-icons icon-trash-simple"></i></a>';
            })
            ->editColumn('active', function($row){
                $check = $row->active == 1 ? "checked" : "";
                return '<label class="switch ">
                            <input type="checkbox" class="primary"'.$check.'>
                            <span class="slider round"></span>
                        </label>';
            })
            ->rawColumns(['action','active'])
            ->make(true);
    }
}
