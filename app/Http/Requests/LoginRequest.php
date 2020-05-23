<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
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
            'customer.email' => 'required|email',
            'customer.password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'customer.email.required' => 'Vui lòng điền Email',
            'customer.email.email' => 'Vui lòng điền một email',
            'customer.password.required' => 'Vui lòng nhập mật khẩu',
        ];
    }
    public function withValidator(Validator $validator)
    {
        if($validator->fails()){
            session()->flash('customer_email',$this->customer['email']);
            $validator->after(function($validator){
                $validator->errors()->add('is_modal','loginModal');
            });
        }
    }
}
