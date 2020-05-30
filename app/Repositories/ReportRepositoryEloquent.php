<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ReportRepository;
use App\Models\Report;
use App\Validators\ReportValidator;
use Auth;
/**
 * Class ReportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ReportRepositoryEloquent extends BaseRepository implements ReportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Report::class;
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
        $input['active'] = $input['active'] ?? 0;
        $input['customer_id'] = Auth::guard('customer')->user()->id;
        $result = $this->model->create($input);
        return $result;
    }
    
}
