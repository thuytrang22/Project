<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequsest extends FormRequest
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
            'name' => 'sometimes|required|string',
            'public' => 'sometimes|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'sometimes|required|string',
            'option' => 'sometimes|required|integer',
            'price' => 'sometimes|required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống tên.',
            'public.required' => 'Không được bỏ trống ảnh.',
            'detail.required' => 'Không được bỏ trống chi tiết món.',
            'price.required' => 'Không được bỏ trống giá.',
        ];
    }
}
