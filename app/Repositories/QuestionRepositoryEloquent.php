<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\QuestionRepository;
use App\Models\Question;
use App\Validators\QuestionValidator;
use Auth;

/**
 * Class QuestionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class QuestionRepositoryEloquent extends BaseRepository implements QuestionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Question::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function activeQuestion()
    {
        $questions = $this->model->active()->with('answer')->get();
        return $questions;
    }
    public function store(array $input){
        $input['customer_id'] = Auth::guard('customer')->user()->id;
        $input['active'] = 0;

        $result = $this->model->create($input);

        return $result;
    }
    
}
