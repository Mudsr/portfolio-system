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
        return [
            'plot_no' => ['required','unique:deals,plot_no'],
            'portfolio_id' => 'required|integer',
            'deal1' => 'required|integer',
            'deal2' => 'required|integer',
            'area_name' => ['required', 'string'],
            'block' => ['required', 'string'],
            'property_value' => ['required', 'string'],
            'finance_amount' => ['required', 'string'],
            'pai_rent' => ['required', 'string'],
            'licensed_purpose' => ['required', 'string'],
            'application_no' => ['required', 'string'],
            'plot_area_size' => ['required', 'string'],
            'pai_issue_date' => ['required', 'date'],
            'pai_expiry_Date' => ['required', 'date'],
            'pai_leasing_contract' => ['required', 'file', 'mimes:pdf,docx'],
            'fire_insurance_issue_date' => ['required', 'date'],
            'fire_insurance_expiry_Date' => ['required', 'date'],
            'fire_insurance_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'power_of_attorney_issue_date' => ['required', 'date'],
            'power_of_attorney_expiry_Date' => ['required', 'date'],
            'power_of_attorney_issue_to' => ['required', 'date'],
            'power_of_attorney_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'new_deal_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
            'poa_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
        ];
    }
}
