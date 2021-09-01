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
        if ($this->isMethod('put')) {
            return $this->validatePutRequest();
        }

        return [
            'portfolio_id' => ['required','integer'],
            'client_id' => ['required','integer'],
            'plot_no' => ['required','string'],
            'area_name' => ['required', 'string'],
            'block' => ['required', 'string'],
            'property_value' => ['required', 'string'],
            'finance_amount' => ['required', 'string'],
            'pai_rent' => ['required', 'string'],
            'licensed_purpose' => ['required', 'string'],
            'application_no' => ['required', 'string'],
            'plot_area_size' => ['required', 'string'],
            'pai_issue_date' => ['required', 'date'],
            'pai_expiry_Date' => ['required', 'date', 'after:pai_issue_date'],
            'pai_leasing_contract' => ['required', 'file', 'mimes:pdf,docx'],
            'fire_insurance_issue_date' => ['required', 'date'],
            'fire_insurance_expiry_Date' => ['required', 'date', 'after:fire_insurance_issue_date'],
            'fire_insurance_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'power_of_attorney_issue_date' => ['required', 'date'],
            'power_of_attorney_expiry_Date' => ['required', 'date', 'after:power_of_attorney_issue_date'],
            'power_of_attorney_issue_to' => ['required', 'string'],
            'power_of_attorney_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'new_deal_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
            'poa_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
        ];
    }

    public function validatePutRequest()
    {
        $rules = [
            'portfolio_id' => ['required','integer'],
            'client_id' => ['required','integer'],
            'plot_no' => ['required','string'],
            'renewed_at' => ['required','date'],
            'pai_issue_date' => ['required', 'date'],
            'pai_expiry_Date' => ['required', 'date', 'after:pai_issue_date'],
            'fire_insurance_issue_date' => ['required', 'date'],
            'fire_insurance_expiry_Date' => ['required', 'date', 'after:fire_insurance_issue_date'],
            'power_of_attorney_issue_date' => ['required', 'date'],
            'power_of_attorney_expiry_Date' => ['required', 'date', 'after:power_of_attorney_issue_date'],
            'power_of_attorney_issue_to' => ['required', 'string'],
        ];

        return $rules;

    }
}
