<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RatingRepository;
use App\Models\Rating;
use App\Validators\RatingValidator;

/**
 * Class RatingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RatingRepositoryEloquent extends BaseRepository implements RatingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rating::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function getAll(array $input,$take=0)
    {
        $result = $this->model->where(['car_id'=>$input['id'],'active'=>1])->with('customers')->latest();
        if($take != 0){
            $result->take($take)->skip(0);
        }
        $data['result'] = $result->get();
        $data['total'] = $result->count();

        return $data;
    }
    public function percentStar(array $input)
    {
        $ratings = $this->model->where(['car_id'=>$input['id'],'active'=>1])->select('star')->get();

        $arr = [
            'rating_5' => 0,
            'rating_4' => 0,
            'rating_3' => 0,
            'rating_2' => 0,
            'rating_1' => 0,
        ];
        $data = [
            'percent_5' => 0,
            'percent_4' => 0,
            'percent_3' => 0,
            'percent_2' => 0,
            'percent_1' => 0,
        ];

        foreach ($ratings as $key => $rating) {
            switch ($rating->star) {
                case 5:
                    $arr['rating_5'] ++;
                    break;
                case 4:
                    $arr['rating_4'] ++;
                    break;
                case 3:
                    $arr['rating_3'] ++;
                    break;
                case 2:
                    $arr['rating_2'] ++;
                    break;
                case 1:
                    $arr['rating_1'] ++;
                    break;
            }
        }

        $total_rating = $ratings->count();

        if($total_rating > 0){
            $data['percent_5'] = round($arr['rating_5']/$total_rating*100);
            $data['percent_4'] = round($arr['rating_4']/$total_rating*100);
            $data['percent_3'] = round($arr['rating_3']/$total_rating*100);
            $data['percent_2'] = round($arr['rating_2']/$total_rating*100);
            $data['percent_1'] = round($arr['rating_1']/$total_rating*100);
        }
        return $data;
    }
}
