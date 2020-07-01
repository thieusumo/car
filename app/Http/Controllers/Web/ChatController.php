<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ChatRepository;
use App\Repositories\CustomerRepository;
use Auth;

class ChatController extends Controller
{
    protected $chat;
    protected $customer;

    public function __construct(
    	ChatRepository $chat,
    	CustomerRepository $customer
    )
    {
    	$this->chat = $chat;
    	$this->customer = $customer;
    }

    public function index($id=0)
    {
    	$send_id = Auth::guard('customer')->user()->id;
    	$data['chats'] = $this->chat->getAll($send_id);
        $id != 0 ? $data['id'] = $id : "";
    	// return $data['chats'];

    	return view('frontend.chating',$data);
    }

    public function send(Request $request)
    {
    	$input = $request->all();
    	$result = $this->chat->store($input);

    	if(!$result)
    		return response(['status'=>'danger', 'message' => 'Error!']);
    	else{
    		return response(['status'=> 'success']);
    	}
    }
    public function conversation(Request $request)
    {
    	$input = $request->all();
    	$customer['id'] = $request['receiver_id'];
    	$receiver = $this->customer->getOne($customer)->first();

    	if($receiver->ava != ""){
    		$ava = asset($receiver->ava);
    		$short_name = "";
    	}else{
    		$ava = "";
    		$short_name = '<span class="text-ava text-white text-uppercase">'. substr($receiver->name,0,1) .'</span>';
    	}
    	//Car List
    	if($receiver->cars->count() > 0){
    		$cars_html = '
    				<span id="action_menu_btn"><i class="fa fa-ellipsis-v"></i></span>
						<div class="action_menu">
						<h5 class="text-primary text-center text-uppercase">Quản lý nhà xe</h5>
							<ul>';
    		foreach ($receiver->cars as $key => $car) {
    		 	$cars_html .= '<li><i class="fa fa-car"></i>'.$car->name.'</li>';
    		}
    		$cars_html .= '</ul>
						</div>';
    	} else $cars_html = "";
    		
    	$receiver_html = '
			<div class="d-flex bd-highlight receiver-head receiver-'.$request['send_id'].'-'.$receiver->id.'">
				<div class="img_cont">
					<img src="'.$ava.'" class="rounded-circle bg-info user_img">
					'.$short_name.'
				</div>
				<div class="user_info">
					<span>'.$receiver->name.'</span>
				</div>
			</div>'.$cars_html;

    	$conversation = $this->chat->getConversation($input);
    	// return $conversation;
    	$detail_html = '';

    	foreach ($conversation as $key => $c) {

    		if($c->send_id != $input['send_id'])
    			$detail_html .= 
    		    '<div class="d-flex justify-content-start mb-4">
					<div class="img_cont_msg">
						<img src="'.$ava.'" class="rounded-circle bg-info user_img_msg">
						'.$short_name.'
					</div>
					<div class="msg_cotainer">
						'.$c->content.'
						<span class="msg_time">'.H_i_d_m($c->created_at).'</span>
					</div>
				</div>';

			else
				$detail_html .= 
					'<div class="d-flex justify-content-end mb-4">
						<div class="msg_cotainer_send">
							'.$c->content.'
							<span class="msg_time_send">'.H_i_d_m($c->created_at) .'</span>
						</div>
					</div>';
    	}

    	$conversation_html = $receiver_html . $detail_html;

    	return response(['receiver_html'=>$receiver_html,'detail_html' => $detail_html]) ;
    }
}
