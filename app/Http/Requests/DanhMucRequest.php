<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhmucRequest extends FormRequest
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
            'danh_muc'=>'required',
        ];
    }
    public function messages()
    {
        return [
                'danh_muc.required'=>'Vui lòng nhập nội danh danh mục',
            ];
    }
}
