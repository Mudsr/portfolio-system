<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
        if ($this->routeIs('close.portfolio')) {
            return $this->validateCloseRequest();
        }

        if ($this->isMethod('put')) {
           return $this->validatePutRequest();
        }

        return [
            'name' => ['required','string'],
            'to' => ['required', 'array'],
            'from' => ['required', 'array'],
            'percentage' => ['required', 'array'],
            'minimum_fee_per_quarter' => ['required', 'numeric'],
            'fee_calculation_method' => ['required', 'string'],
            'contact_person' => ['nullable', 'string'],
            'contact_number' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email'],
            'agreement_date' => ['nullable', 'date'],
            'agreement_expiry' => ['nullable', 'date'],
            'agreement_document' => ['nullable', 'file', 'mimes:pdf,docx']
        ];
    }

    public function validatePutRequest()
    {
        return [
            'to' => ['required', 'array'],
            'from' => ['required', 'array'],
            'percentage' => ['required', 'array'],
            'minimum_fee_per_quarter' => ['required', 'numeric'],
            'contact_person' => ['nullable', 'string'],
            'contact_number' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'email'],
            'agreement_date' => ['nullable', 'date'],
            'agreement_expiry' => ['nullable', 'date'],
            'update_effective_from' => ['required', 'date'],
            'agreement_document' => ['nullable', 'file', 'mimes:pdf,docx']
        ];
    }

    public function validateCloseRequest()
    {
        return [
            'closing_date' => ['required', 'date'],
            'closing_reason' => ['required', 'string'],
            'closing_remarks' => ['required', 'string'],
            'management_fee_last_calculated_at'=> ['required', 'date'],
        ];
    }

}
