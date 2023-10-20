<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_dishe' => 'required|string',
            'public' => 'required|string',
            'detail' => 'required|string',
            'price' => 'required|string'
         ];
    }

    public function messages()
    {
        return [
            'name_dishe.required' => 'Không được bỏ trống tên.',
            'public.required' => 'Không được bỏ trống ảnh.',
            'detail.required' => 'Không được bỏ trống chi tiết món.',
            'price.required' => 'Không được bỏ trống giá.',
        ];
    }
}
