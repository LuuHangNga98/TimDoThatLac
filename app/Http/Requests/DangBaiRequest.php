<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangBaiRequest extends FormRequest
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
            'tieu_de'=>'required',
            'noi_dung'=>'required',
            'dia_chi'=>'required',
            'dien_thoai'=>'required|min:10|max:10',
            // 'file[]'=>'required',
        
        ];
    }
    public function messages()
    {
        return [
                'tieu_de.required'=>'Vui lòng nhập tiêu đề',
                'noi_dung.required'=>'Vui lòng nhập nội dung',
                'dia_chi.required'=>'Vui lòng nhập địa chỉ',
                'dien_thoai.required'=>'Vui lòng nhập số điện thoại',
                'dien_thoai.min'=>'Số điện thoại tối thiểu 10 số',
                'dien_thoai.max'=>'Số điện thoại tối đa 10 số',
                // 'file[].required'=>'Vui lòng thêm ảnh'
            ];
    }
}
