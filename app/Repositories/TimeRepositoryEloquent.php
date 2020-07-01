<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TimeRepository;
use App\Models\Time;
use App\Validators\TimeValidator;

/**
 * Class TimeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TimeRepositoryEloquent extends BaseRepository implements TimeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Time::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function storeMany(array $input)
    {
        $result = $this->model->insert($input);
        return $result;
    }
}
