<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={
 *         "identification",
 *         "phone"
 *     },
 * )
 */
class ShowWalletRequest extends FormRequest
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
     * @OA\Property(type="number", description="phone", property="phone"),
     */
    public function rules()
    {
        return [
            'identification' => 'required|integer|min_digits:6|max_digits:11',
            'phone' => 'required|integer|min_digits:10|max_digits:10',
        ];
    }
}
