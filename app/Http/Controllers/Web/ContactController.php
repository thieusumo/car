<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(
    	ContactRepository $contact
    ){
    	$this->contact = $contact;
    }
    public function contact(ContactRequest $request)
    {
    	$input = $request->all();
    	$result = $this->contact->store($input);

    	if(!$result)
    		return back()->with('danger','Lỗi. Vui lòng kiểm tra lại');

    	return redirect()->route('home')->with('success','Thành công. Yêu cầu của bạn đã được gửi!');
    }
}
