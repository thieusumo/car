<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeCar;
use App\Models\Car;
use App\Models\Menu;
use DataTables;
use App\Models\Rating;
use App\Repositories\QuestionRepository;
use App\Repositories\RatingRepository;


class PageController extends Controller
{
    protected $question;
    protected $rating;

    public function __construct(
        QuestionRepository $question,
        RatingRepository $rating
    )
    {
        $this->question = $question;
        $this->rating = $rating;
    }
    public function index(){
        $cars = Car::join('route',function($join){
            $join->on('cars.route_id','route.id');
        })
        ->where('cars.car_type',1)
        ->select('cars.name as car_name','cars.slug as car_slug','cars.*','route.*')
        ->orderBy('cars.stars','desc')
        ->get();
        $data['cars'] = $cars->groupBy('name');

    	return view('frontend.pages.home',$data);
    }
    public function page($slug,$car_name=""){
        
        //Check slug menu
        $check_menu = Menu::active()->where('slug',$slug);
        if($check_menu->count() == 0)
            abort(404);

        if($slug == 'lien-he' || $slug == 'dang-nhap' || $slug == 'dang-ki' || $slug == 'dang-xuat'){

            if(!is_file(resource_path('views/frontend/pages/'.$slug.'.blade.php')))
                return abort('404');
            return view('frontend.pages.'.$slug);

        }elseif($slug == 'xe-tien-chuyen'){

                $data['name'] = $check_menu->first()->name;
                $data['slug'] = $slug;
                $cars = Car::where([['car_type',2],['active',1]]);

            if($car_name == ""){
                $data['cars'] = $cars->paginate(15);
                return view('frontend.pages.xe-tien-chuyen',$data);
            }else{
                $car_info = $cars->where('slug',$car_name);
                if($car_info->count() == 0)
                    abort(404);
                $data['car'] = $car_info->first();
                $data['comment_list'] = Rating::where(['car_id'=>$data['car']->id,'active'=>1])->with('customers')->get();
                return view('frontend.car.car-detail',$data);
            }
                
        }else{
            $data['name'] = $check_menu->first()->name;
            $data['slug'] = $slug;
            $cars = Car::join('route',function($join){
                    $join->on('cars.route_id','route.id');
                })
                ->where([['route.route',$slug],['cars.car_type',1],['cars.active',1]])
                ->select('route.*','cars.*','route.name as route_name');

            if($car_name == ""){
                $data['cars'] = $cars->paginate(15);
                return view('frontend.pages.list-car',$data);
            }else{
                $car_info = $cars->where('slug',$car_name);
                if($car_info->count() == 0)
                    abort(404);
                $data['car'] = $car_info->first();
                $input['id'] = $data['car']->id;
                $data['comment_list'] = $this->rating->getAll($input,10);
                $data['question'] = $this->question->activeQuestion($input,5);
                $data['rating_percent'] = $this->rating->percentStar($input);

                return view('frontend.car.car-detail',$data);
            }
        }
    }
    public function carType($type){
        return 'ok';
        $type_car = TypeCar::active()->where('slug',$type)->first();
        if(!isset($type_car) || $type_car == "")
            return back()->with('danger',"Can Not Find Type Car");
        $data['cars'] = Car::has('getTypeCar')->has('getRoute')->where('car_type',$type_car->id)->paginate(15);

        return view('frontend.pages.car-type',$data);
    }

}
