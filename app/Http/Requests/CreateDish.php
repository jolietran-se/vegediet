<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDish extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:8',
            'description' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'name.required' => 'Vui lòng điền tên món ăn',
            'name.min' => 'Tên món ăn ngắn quá ',
            'description.required' => 'Vui lòng điền mô tả món ăn',
        ];
    }
}
