<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class register extends FormRequest
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
            'email' => 'unique:users,email,' . $this->id,
            'password' => 'min:8',
            'phone'=>'min:10|max:10',
        ];
    }
    public function messages(){
        return [
            'email.unique'=>':attribute đã tồn tại',
            'password.min'=>'Mật khẩu phải từ 8 ký tự',
            'phone.min' =>  'Số điện thoại phải có 10 số',
            'phone.max' =>  'Số điện thoại phải có 10 số',
        ];
    }
}
