<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'identification' => 'required|integer|unique:users|min_digits:6|max_digits:11',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|integer|unique:users|min_digits:10|max_digits:10',
        ];
    }
}
