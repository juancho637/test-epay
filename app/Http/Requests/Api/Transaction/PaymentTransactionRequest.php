<?php

namespace App\Http\Requests\Api\Transaction;

use Illuminate\Foundation\Http\FormRequest;

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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
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
