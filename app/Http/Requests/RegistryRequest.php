<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RegistryRequest extends FormRequest
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
            'customer.name' => 'required||min:6',
            'customer.email' => 'required|email|unique:customers,email',
            'customer.password' =>'required|min:6|same:customer.password_confirm',
        ];
    }

    public function messages()
    {
        return [
            'customer.name.min' => 'Tên người dùng ít nhất 6 kí tự',
            'customer.name.required' => 'Tên người dùng bắt buộc',
            'customer.email.required' => 'Địa chỉ email bắt buộc',
            'customer.email.email' => 'Hãy điền một email khả dụng',
            'customer.email.unique' => 'Email này đã được sử dụng',
            'customer.password' => 'Nhập mật khẩu',
            'customer.password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'customer.password.same' => 'Mật khẩu không khớp'
        ];
    }

    public function withValidator(Validator $validator){
        if($validator->fails()){
            session()->flash('email',$this->customer['email']);
            session()->flash('customer_name',$this->customer['email']);
            $validator->after(function($validator){
                $validator->errors()->add('is_modal','registryModal');
            });
        }
    }
}
