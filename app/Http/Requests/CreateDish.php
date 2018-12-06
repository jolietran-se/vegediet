<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDish extends FormRequest
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
            'name' => 'required|min:8|max:30',
            'slug' => 'required|min:8|max:30',
            'description' => 'required',
        ];
    }
    public function messages() 
    {
        return [
            'name.required' => 'Vui lòng điền tên món ăn',
            'name.min' => 'Tên món ăn ngắn quá ',
            'name.max' => 'Tên món ăn ngắn dài ',
            'description.required' => 'Vui lòng điền mô tả món ăn',
        ];
    }
}
