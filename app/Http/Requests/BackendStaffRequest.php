<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendStaffRequest extends FormRequest
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
            'email'=>'required|unique:admins,email,'.$this->id,
            'phone' =>'required',
            'password' =>'required',
            'name' =>'required',
            'address' =>'required',
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Dữ liệu không được để trống',
            'name.required' => 'Dữ liệu không được để trống',
            'phone.required' => 'Dữ liệu không được để trống',
            'password.required' => 'Dữ liệu không được để trống',
            'address.required' => 'Dữ liệu không được để trống',
            'email.unique' => 'Dữ liệu đã tồn tại',
        ];
    }
}
