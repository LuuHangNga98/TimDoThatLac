<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'password' => 'required|min:8',
            'email' => 'required|email',
            'ho_ten'=>'required',
            'confirm_password'=>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Vui lòng nhập mật khẩu trên 8 kí tự',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định dạng abc@gmail.com',
                'ho_ten.required' => 'Vui lòng nhập họ tên',
                'confirm_password.required'=>'Vui lòng nhập xác nhận mật khẩu',
                'confirm_password.same'=>'Xác nhận mật khẩu chưa trùng khớp với mật khẩu'
            ];
    }
}
