<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AnswerRepository;
use App\Models\Answer;
use Auth;

/**
 * Class AnswerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AnswerRepositoryEloquent extends BaseRepository implements AnswerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Answer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function store(array $input)
    {
        $input['customer_id'] = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : null;
        $result = $this->model->create($input);
        return $result;
    }
    
}
