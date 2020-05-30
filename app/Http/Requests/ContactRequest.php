<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|min:6',
            'phone'     => 'required|numeric|digits:10',
            'content'   => 'required|min:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ Tên bắt buộc điền',
            'name.min' => 'Vui lòng điền cả họ tên',
            'phone.required' => 'Vui lòng điền số điện thoại',
            'phone.numeric' => 'Vui lòng điền số điện thoại',
            'phone.digits' => 'Vui lòng điền số điện thoại',
            'content.required' => 'Vui lòng ghi nội dung',
            'content.min' => 'Nội dung ít nhất 50 kí tự' 
        ];
    }
    public function withValidator(Validator $validator)
    {
        if($validator->fails()){
            session()->flash('c_name',$this->name);
            session()->flash('c_phone',$this->phone);
            session()->flash('c_title',$this->title);
            session()->flash('content',$this->content);
        }
    }

}
