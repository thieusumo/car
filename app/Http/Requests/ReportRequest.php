<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'title' => 'required',
            'content' =>'required',
            'contact' => 'required|numeric|digits:10'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'content.required' => 'Nội dung không được bỏ trống',
            'contact.required' => 'Số điện thoại không được bỏ trống',
            'contact.numeric' => 'Hãy điền Số Điện Thoại',
            'contact.digits' => 'Hãy điền số điện thoại khả dụ',
        ];
    }
    public function fails(array $input)
    {
        $validator = $this->factory->make($input, $this->rules, $this->messages);
        $result = $validator->fails($input);
        $this->errors = $validator->messages();
        return $result;
    }

}
