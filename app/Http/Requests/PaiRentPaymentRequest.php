<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiRentPaymentRequest extends FormRequest
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
            'client_id' => ['required', 'integer'],
            'deal_id' => ['required', 'integer'],
            'entry_date' => ['required','date' ],
            'from_date' => ['required','date'],
            'to_date' => ['required', 'date', 'after:from_date'],
            'comments' => ['required','string'],
            'receipt_voucher' => ['required','file'],
        ];
    }
}
