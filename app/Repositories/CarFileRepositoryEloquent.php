<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CarFileRepository;
use App\Models\CarFile;
use App\Validators\CarFileValidator;

/**
 * Class CarFileRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CarFileRepositoryEloquent extends BaseRepository implements CarFileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarFile::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function storeArray(array $input)
    {
        $result = $this->model->insert($input);
        return $result;
    }
    public function getOne($car_id)
    {
        $result = $this->model->where([['car_id',$car_id],['active',1]])->get();
        return $result;
    }
    public function remove($id)
    {
        return $this->model->find($id)->delete();
    }
}
