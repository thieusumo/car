<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TypeCarRepository;
use App\Models\TypeCar;
use App\Validators\TypeCarValidator;

/**
 * Class TypeCarRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TypeCarRepositoryEloquent extends BaseRepository implements TypeCarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeCar::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
