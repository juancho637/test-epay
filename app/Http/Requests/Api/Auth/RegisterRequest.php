<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={
 *         "identification",
 *         "name",
 *         "email",
 *         "phone"
 *     },
 * )
 */
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
     * @OA\Property(type="number", description="identification", property="identification"),
     * @OA\Property(type="string", description="name", property="name"),
     * @OA\Property(type="string", description="email", property="email"),
     * @OA\Property(type="number", description="phone", property="phone"),
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
