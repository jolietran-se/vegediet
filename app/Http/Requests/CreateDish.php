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
            'name.required' => 'Bạn chưa nhập tên món ăn',
            'name.min' => 'Tên món ăn có tối thiểu 8 kí tự  ',
            'description.required' => 'Bạn chưa viết mô tả',
        ];
    }
}
