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
            'name' => 'required|min:8|max:50',
            'description' => 'required',
            'file' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'name.required' => 'Bạn chưa nhập tên món ăn',
            'name.min' => 'Tên món ăn có tối thiểu 8 kí tự  ',
            'name.max' => 'Tên món ăn có tối đa 50 kí tự  ',
            'description.required' => 'Bạn chưa viết mô tả',
            'file.required' => 'Bạn chưa tải ảnh lên',
        ];
    }
}
