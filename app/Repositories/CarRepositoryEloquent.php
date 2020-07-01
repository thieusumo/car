<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CarRepository;
use App\Models\Car;
use App\Validators\CarValidator;

/**
 * Class CarRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CarRepositoryEloquent extends BaseRepository implements CarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Car::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function getOne($id)
    {
        $car = $this->model->with('files')->find($id);
        return $car;
    }
    public function store(array $input)
    {
        $input['active'] = $input['active'] ?? 1;
        $result = $this->model->create($input);
        return $result;
    }
    //Check cars in route
    public function carInRoute($route_id)
    {
        $car = $this->model->where('route_id',$route_id)->get();
        return $car;
    }
    public function getAll()
    {
        $result = $this->model
                ->with('getTypeCar')
                ->with('getRoute')
                ->with('customer')
                ->latest()
                ->get();

        return $result;
    }
    public function update(array $input, $id)
    {
        $result = $this->model->find($id)->update($input);
        return $result;
    }
}
