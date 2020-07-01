<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;
use DB;

class MessageController extends Controller
{
	protected $question;
	protected $answer;

	public function __construct(
		QuestionRepository $question,
		AnswerRepository $answer
	){
		$this->question = $question;
		$this->answer = $answer;
	}
    public function index($car_id)
    {
    	$data['questions'] = $this->question->allQuestion($car_id);
    	$data['id'] = $car_id;
    	$data['not_active_question'] = $this->question->notActiveQuestion($car_id);
    	return view('frontend.message.list',$data);
    }
    public function save(Request $request)
    {
    	$input = $request->all();

    	DB::beginTransaction();
    	try{
    		$this->question->changeStatus($request->car_id);

	    	$this->answer->store($input);

	    	DB::commit();

	    	return response(['status'=>'success','message'=>'Cập nhật thành công']);

    	}catch(\Exception $e){

    		\Log::info($e);

    		DB::rollBack();

    		return response(['status'=>'danger','message'=>'Lỗi']);
    	}
    }
}
