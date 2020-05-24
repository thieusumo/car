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

    public function activeQuestion(array $input,$take=0)
    {
        $questions = $this->model->active()->where('car_id',$input['id'])->with('answer')->latest();
        if($take != 0 ){
            $questions->take(5)->skip(0);
        }
        $data['questions'] = $questions->get();
        $data['total'] = $questions->count();
        return $data;
    }
    public function store(array $input){
        $input['customer_id'] = Auth::guard('customer')->user()->id;
        $input['active'] = 0;

        $result = $this->model->create($input);

        return $result;
    }
    
}
