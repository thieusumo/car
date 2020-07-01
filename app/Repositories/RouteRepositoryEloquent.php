<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RouteRepository;
use App\Models\Route;
use App\Validators\RouteValidator;

/**
 * Class RouteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RouteRepositoryEloquent extends BaseRepository implements RouteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Route::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function list()
    {
        return $this->model->all();
    }
    public function listActive()
    {
        return $this->model->where('active',1)->get();
    }
    public function remove($id)
    {
        $result = $this->model->find($id)->delete();
        return $result;
    }
    public function store(array $input)
    {
        $input['active'] = $input['active'] ?? 1;

        $result = $this->model->create($input);

        return $result;
    }
    public function update(array $input,$id)
    {
        $result = $this->model->find($id)->update($input);
        return $result;
    } 
}
