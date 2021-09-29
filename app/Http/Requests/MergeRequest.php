<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MergeRequest extends FormRequest
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
        // dd($this->all());
        return [
            'plot_no' => ['required','string'],
            'portfolio_id' => 'required|integer',
            'deal1' => 'required|integer',
            'deal2' => 'required|integer',
            'area_name' => ['required', 'string'],
            'block' => ['required', 'string'],
            'property_value' => ['required', 'string'],
            'finance_amount' => ['required', 'string'],
            'pai_rent' => ['nullable', 'string'],
            'licensed_purpose' => ['nullable', 'string'],
            'application_no' => ['nullable', 'string'],
            'plot_area_size' => ['nullable', 'string'],
            'pai_issue_date' => ['nullable', 'date'],
            'pai_expiry_date' => ['nullable', 'date'],
            'pai_leasing_contract' => ['nullable', 'file', 'mimes:pdf,docx'],
            'fire_insurance_issue_date' => ['nullable', 'date'],
            'fire_insurance_expiry_date' => ['nullable', 'date'],
            'fire_insurance_copy' => ['nullable', 'file', 'mimes:pdf,docx'],
            'power_of_attorney_issue_date' => ['nullable', 'date'],
            'power_of_attorney_expiry_date' => ['nullable', 'date'],
            'power_of_attorney_issue_to' => ['nullable', 'date'],
            'power_of_attorney_copy' => ['nullable', 'file', 'mimes:pdf,docx'],
            'new_deal_email_attachment' => ['nullable', 'file', 'mimes:pdf,docx'],
            'poa_email_attachment' => ['nullable', 'file', 'mimes:pdf,docx'],
        ];
    }
}
