<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
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
        if ($this->routeIs('deal.close')) {
            return $this->validateCloseRequest();
        }

        if ($this->isMethod('put')) {
            return $this->validatePutRequest();
        }

        return [
            'portfolio_id' => ['required','integer'],
            'client_id' => ['required','integer'],
            'plot_no' => ['required','string'],
            'area_name' => ['required', 'string'],
            'block' => ['required', 'string'],
            'property_value' => ['required', 'numeric'],
            'finance_amount' => ['required', 'numeric'],
            'pai_rent' => ['nullable', 'string'],
            'licensed_purpose' => ['nullable', 'string'],
            'application_no' => ['nullable', 'string'],
            'plot_area_size' => ['nullable', 'string'],
            'pai_issue_date' => ['nullable', 'date'],
            'pai_expiry_date' => ['nullable', 'date', 'after:pai_issue_date'],
            'pai_leasing_contract' => ['nullable', 'file', 'mimes:pdf,docx'],
            'fire_insurance_issue_date' => ['nullable', 'date'],
            'fire_insurance_expiry_date' => ['nullable', 'date', 'after:fire_insurance_issue_date'],
            'fire_insurance_copy' => ['nullable', 'file', 'mimes:pdf,docx'],
            'power_of_attorney_issue_date' => ['nullable', 'date'],
            'power_of_attorney_expiry_date' => ['nullable', 'date', 'after:power_of_attorney_issue_date'],
            'power_of_attorney_issue_to' => ['nullable', 'string'],
            'power_of_attorney_copy' => ['nullable', 'file', 'mimes:pdf,docx'],
            'new_deal_email_attachment' => ['nullable', 'file', 'mimes:pdf,docx'],
            'poa_email_attachment' => ['nullable', 'file', 'mimes:pdf,docx'],
            'extra_attachments' => ['nullable', 'file', 'mimes:pdf,docx'],
            'entry_date' => ['required', 'date'],
        ];
    }

    public function validatePutRequest()
    {
        $rules =  [
            'portfolio_id' => ['required','integer'],
            'client_id' => ['required','integer'],
            'plot_no' => ['required','string'],
            'pai_issue_date' => ['nullable', 'date'],
            'pai_expiry_date' => ['nullable', 'date', 'after:pai_issue_date'],
            'fire_insurance_issue_date' => ['nullable', 'date'],
            'fire_insurance_expiry_date' => ['nullable', 'date', 'after:fire_insurance_issue_date'],
            'power_of_attorney_issue_date' => ['nullable', 'date'],
            'power_of_attorney_expiry_date' => ['nullable', 'date', 'after:power_of_attorney_issue_date'],
            'power_of_attorney_issue_to' => ['nullable', 'string'],
        ];

        if ($this->routeIs('deal.renew')) {
            $rules['renewed_at'] = ['required','date'];
        }

        return $rules;
    }

    public function validateCloseRequest()
    {
        return [
            'closing_date' => ['required', 'date'],
            'sold_to' => ['required', 'string'],
        ];
    }
}
