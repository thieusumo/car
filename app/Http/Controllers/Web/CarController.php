<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Route;
use App\Models\TypeCar;
use App\Models\Times;
use Carbon\Carbon;
use Auth, Validator, DB, DataTables;
use App\Models\Rating;
use App\Repositories\RatingRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\CarRepository;
use App\Repositories\ReportRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\CarFileRepository;
use App\Repositories\TimeRepository;

use App\Http\Requests\XeKackRequest;

class CarController extends Controller
{
    protected $question;
    protected $rating;
    protected $car;
    protected $report;
    protected $notification;
    protected $car_file;
    protected $time;

    public function __construct(
        QuestionRepository $question,
        RatingRepository $rating,
        CarRepository $car,
        ReportRepository $report,
        NotificationRepository $notification,
        CarFileRepository $car_file,
        TimeRepository $time
    )
    {
        $this->question = $question;
        $this->rating = $rating;
        $this->car = $car;
        $this->report = $report;
        $this->notification = $notification;
        $this->car_file = $car_file;
        $this->time = $time;
    }
    public function edit(){
        $data['routes'] = Route::active()->get();
        $data['type_cars'] = TypeCar::active()->get();

        return view('frontend.car.edit-car',$data);
    }
    public function datatable(Request $request){

        if($request->slug == 'xe-tien-chuyen')
            $cars = Car::where('car_type',2)->get();
        else
            $cars = Car::where('car_type',1)->where('route_id',$request->route_car)->get();
        return DataTables::of($cars)
        ->addColumn('station',function($row){
            return $row->station_go." - ".$row->station_back;
        })
        ->make(true);
    }
    public function save(Request $request){

        $rules = [
            'name'          => 'required|min:4',
            'license_plate' => 'required|min:8|unique:cars,license_plate',
            'phone'         => 'required'
        ];
        $messages = [
            'name.required'             => 'Tên bắt buộc',
            'name.min'                  => 'Tên nhà xe ít nhất 4 kí tự',
            'license_plate.required'    => 'Biển số bắt buộc',
            'license_plate.unique'      => 'Biển số đã tồn tại',
            'license_plate.min'         => 'Điền một biển số',
            'phone.required'            => 'Liên hệ bắt buộc',
        ];
        if($request->car_type == 1){
            $rules['clock_go'] = 'required';
            $rules['date_go'] = 'required';
            $rules['clock_back'] = 'required';
            $rules['date_back'] = 'required';
            $rules['line'] = 'required';
            $rules['station_go'] = 'required';
            $rules['station_back'] = 'required';

            $messages['line.required'] = 'Lộ trình bắt buộc';
            $messages['station_go.required'] = 'Bến đi bắt buộc';
            $messages['station_back.required'] = 'Bến về bắt buộc';
            $messages['clock_go.required'] = 'Thời gian đi bắt buộc';
            $messages['clock_back.required'] = 'Thời gian về bắt buộc';
            $messages['date_go.required'] = 'Ngày đi bắt buộc';
            $messages['date_back.required'] = 'Ngày về bắt buộc';
        }
        $validator = Validator::make($request->all(),$rules,$messages);
            if($validator->fails())
                return response([
                    'status'=>'danger',
                    'message'=> $validator->getMessageBag()->toArray()
                ]);

        //Check name car unique in route
        if($request->car_type == 1){
            $check_car = Car::where([
                ['route_id',$request->route_id],
                ['name',$request->name]
            ])->count();
            if($check_car > 0)
                return response(['status'=>'danger','message'=>'Tên nhà xe đã bị trùng!']);
        }else{
            $check_car = Car::where('name',$request->name)->whereNull('route_id')->count();
            if($check_car > 0)
                return response(['status'=>'danger','message'=>'Tên nhà xe đã bị trùng!']);
        }
        $input = $request->all();

        DB::beginTransaction();
        try{
            if($request->has('ava')){
                $input['ava'] = uploadImage($request->ava,'cars');
            }
            $input['phone'] = implode(';', $request->phone);
            $input['slug'] = str_slug($request->name);
            $input['stars'] = 0;
            $input['total_star'] = 0;
            $input['customer_id'] = Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : null;

            $car = $this->car->store($input);

            if($request->has('more_image')){
                $file_array = [];
                foreach ($request->more_image as $key => $value) {
                    if($value->getClientOriginalName() != null){
                        $file_array[] = [
                            'car_id' => $car->id,
                            'image_src' => uploadImage($value, 'cars'),
                            'type' => 1,
                            'active' => 1,
                        ];
                    }
                }
                $this->car_file->storeArray($file_array);
            }
            if($request->has('date_go') && $request->has('date_back'))
            {
                $year = now()->format('Y');

                $date_back = $request->date_back;
                $clock_go = Carbon::parse($request->clock_go)->format('H:i:s');
                $clock_back= Carbon::parse($request->clock_back)->format('H:i:s');
                foreach ($request->date_go as $key => $date_go) {
                    $date[] = [
                        'car_id' => $car->id,
                        'route_type' => $car->route_id,
                        'back' => $year."-5-".$date_back[$key]." ".$clock_back,
                        'go' => $year."-5-".$date_go." ".$clock_go,
                    ];
                }
                $this->time->storeMany($date);
            }
            DB::commit();
            return response(['status'=>'success','message'=>'Thành công!']);
        }
        catch(\Exception $e){
            \Log::info($e);
            DB::rollBack();
            return response(['status' => 'danger', 'message' => 'Lỗi. Vui lòng kiểm tra lại!']);
        }
            
            
        return 'ok';
        // return $request->more->getClientOriginalName();
    }
    public function search(Request $request){

        $tuyen = $request->tuyen;
        $chieu = $request->chieu;
        $ngay = $request->ngay;
        $gio = $request->gio;

        //Lấy tên tuyến
        $check_tuyen = Route::where('route',$tuyen)->first();
        if(!$check_tuyen){
            $data['name'] = $tuyen;
            $data['slug'] = $tuyen;
        }else{
            $data['name'] = $check_tuyen->name;

            if($chieu == 'di') $return = 'go'; else $return = 'back';

            $data['cars'] = DB::table('times')->join('cars', function($join){
                $join->on('times.route_type','cars.route_id')
                ->on('times.car_id','cars.id');
            })
            ->join('route', function($join){
                $join->on('times.route_type','route.id');
            })
            ->where('route.route',$tuyen);

            if($ngay && $ngay != ""){
                $ngay = Carbon::parse($ngay)->format('d');
                $table = 'times.'.$return;
                $data['cars']->whereDay($return,$ngay);
            }
            if($gio && $gio != "")
                $data['cars']->whereTime('times.'.$return, ">=", Carbon::parse($gio)->subHour(1))
                        ->whereTime('times.'.$return,"<=", Carbon::parse($gio)->addHour(1));
            $data['slug'] = $tuyen;
            $data['cars'] = $data['cars']->paginate(15);

            $data['search_date'] = Carbon::parse($request->ngay)->format('d/m/Y');
            $data['search_clock'] = $gio;
            $data['search_chieu'] = $chieu;
        }

        return view('frontend.pages.list-car',$data);
    }
    public function rating(Request $request)
    {
        // return $request->all();
        $customer_info = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : null;
        if($customer_info == null){
            return response(['status'=>'danger','message'=>'Bạn phải đăng kí tài khoản trước']);
        }
        DB::beginTransaction();
        try{
            // save comment to rating table
            $input = $request->all();
            $input['customer_id'] = $customer_info->id;
            $input['car_id'] = $request->car_id;
            $input['active'] = 1;
            $rate = Rating::create($input);

            // get average star and total star
            $rating_info = Rating::where('car_id',$input['car_id'])->active();
            $avg_star = substr($rating_info->avg('star'),0,3);
            $total_star = $rating_info->count();

            //Get car info
            $car_info = Car::find($input['car_id']);
            // update star, total star in cars table
            $car_info->update(['stars'=>$avg_star,'total_star'=>$total_star]);

            // add to notification
            $input_notification = $this->getArrayNotification($customer_info, $car_info);
            $input_notification['content'] = $customer_info->name . " " . "đã thêm bình luận ở: ".$car_info->name;
            $notification_info = $this->notification->store($input_notification);

            DB::commit();
            return response(['status'=>'success','message' => 'Đánh giá thành công. Cảm ơn đóng góp của bạn!']);

        }catch(Exception $e){
            \Log::info($e);
            DB::rollBack();
            return response(['status'=>'danger','message'=>'Quá trình xử lí bị lỗi']);
        }
    }
    public function question(Request $request)
    {
        $customer_info = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : null;
        if($customer_info == null){
            return response(['status'=>'danger','message'=>'Bạn phải đăng kí tài khoản trước']);
        }
        $input = $request->all();

        DB::beginTransaction();
        try{
            //Save question to database
            $result = $this->question->store($input);
            //Get car info
            $car_info = Car::find($input['car_id']);

            //Save Notification
            $input_notification = $this->getArrayNotification($customer_info, $car_info);
            $input_notification['content'] = $customer_info->name . " " . "đã thêm một câu hỏi ở: ".$car_info->name;

            $notification_info = $this->notification->store($input_notification);

            DB::commit();
            return response(['status'=>'success','message'=>'Câu hỏi của bạn đã được gửi đi và sẽ được trả lời trong thời gian sớm nhất!']);

        }catch(\Exception $e){
            \Log::info($e);
            DB::rollBack();
            return response(['status'=>'danger','message'=>'Quá trình xử lí bị lỗi. Vui lòng thử lại sau!']);
        }
    }
    public function allRating($car_id)
    {
        $data['car'] = $this->car->getOne($car_id);

        if(!$data['car'])
            abort('404');

        $input['id'] = $car_id;
        $data['comment_list'] = $this->rating->listStar($input);

        return view('frontend.pages.all-rating',$data);
    }
    public function allQuestion($car_id)
    {
        $data['car'] = $this->car->getOne($car_id);

        if(!$data['car'])
            abort(404);
        $input['id'] = $car_id;
        $data['question'] = $this->question->activeQuestion($input);

        return view('frontend.pages.all-question',$data);
    }
    public function report(Request $request)
    {
        //Check Customer
        $customer_info = Auth::guard('customer')->check() ? Auth::guard('customer')->user() : null;
        if($customer_info == null){
            return response(['status'=>'danger','message'=>'Bạn phải đăng kí tài khoản trước']);
        }
        $input = $request->all();
        DB::beginTransaction();
        try{
            // Save report to database
            $result = $this->report->store($input);
            // Save notification
            $car_info = Car::find($input['car_id']);
            //Save Notofication
            $input_notification = $this->getArrayNotification($customer_info, $car_info);
            $input_notification['content'] = $customer_info->name ." báo cáo: ".$car_info->name;
            $notification_info = $this->notification->store($input_notification);

            DB::commit();
            return response(['status'=>'success','message'=>'Cảm ơn sự trợ giúp của bạn!']);

        }catch(Exception $e){
            \Log::info($e);
            DB::rollBack();
            return  response(['status'=>'danger','message'=>'Lỗi. Hãy thử lại sau!']);
        }
    }
    public static function getArrayNotification($customer_info, $car_info)
    {
        $input_notification['send_id'] = $customer_info->id;
        $input_notification['receiver_id'] = $car_info->customer_id ?? null;
        //Get route or Type Car
        $car_type = $car_info->getRoute->route ?? $car_info->getTypeCar->slug;
        $input_notification['href'] = route('route',[$car_type,$car_info->slug]);

        return $input_notification;
    }
}
