<?php

namespace App\Http\Requests\Api\Transaction;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     required={
 *         "amount",
 *         "identification",
 *         "phone"
 *     },
 * )
 */
class PaymentTransactionRequest extends FormRequest
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
     * @OA\Property(type="number", description="amount", property="amount"),
     * @OA\Property(type="number", description="identification", property="identification"),
     * @OA\Property(type="number", description="phone", property="phone"),
     */
    public function rules()
    {
        return [
            'amount' => 'required|integer|min_digits:1|min:1',
            'identification' => 'required|integer|min_digits:6|max_digits:11|min:111111',
            'phone' => 'required|integer|min_digits:10|max_digits:10|min:1111111111',
        ];
    }
}
