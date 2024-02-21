<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookTableRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'booking_date' => 'required|date',
            'time' => 'required|string|max:255',
            'people' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name cannot be left blank.',
            'email.required' => 'The email cannot be left blank.',
            'phone.required' => 'The phone cannot be left blank.',
            'booking_date.required' => 'The date cannot be left blank.',
            'time.required' => 'The time cannot be left blank.',
            'people.required' => 'The people cannot be left blank.',
        ];
    }
}
