<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheloaiRequest extends FormRequest
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
            'the_loai'=>'required',
        ];
    }
    public function messages()
    {
        return [
                'the_loai.required'=>'Vui lòng nhập nội danh thể loại',
            ];
    }
}
