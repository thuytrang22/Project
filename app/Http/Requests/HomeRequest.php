<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
           'phone' => 'sometimes|required|string',
           'table_number' => 'sometimes|required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống tên.',
            'phone.required' => 'Không được bỏ trống số điện thoại.',
            'table_number.required' => 'Không được bỏ trống số bàn.',
        ];
    }
}
