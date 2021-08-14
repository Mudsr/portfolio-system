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
            'management_fee' => ['required', 'numeric'],
            'minimum_fee_per_quarter' => ['required', 'numeric'],
            'fee_calculation_method' => ['required', 'string'],
            'contact_person' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'contact_email' => ['required', 'string', 'email'],
            'agreement_date' => ['required', 'date'],
            'agreement_expiry' => ['required', 'date'],
            'agreement_document' => ['required', 'file', 'mimes:pdf,docx']
        ];
    }

    public function validatePutRequest()
    {
        return [
            'management_fee' => ['required', 'numeric'],
            'minimum_fee_per_quarter' => ['required', 'numeric'],
            'contact_person' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'contact_email' => ['required', 'string', 'email'],
            'agreement_date' => ['required', 'date'],
            'agreement_expiry' => ['required', 'date'],
            'update_effective_from' => ['required', 'date'],
            'agreement_document' => ['required', 'file', 'mimes:pdf,docx']
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
