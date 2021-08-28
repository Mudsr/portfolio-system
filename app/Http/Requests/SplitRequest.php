<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SplitRequest extends FormRequest
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
        $plot1Rules = $this->plot1Validations();
        $plot2Rules = $this->plot2Validations();

        return array_merge($plot1Rules, $plot2Rules);
    }

    private function plot1Validations()
    {
        return [
            'deal_id' => 'required|integer',
            'portfolio_id' => 'required|integer',
            'plot1.plot_no' => ['required','unique:deals,plot_no'],
            'plot1.area_name' => ['required', 'string'],
            'plot1.block' => ['required', 'string'],
            'plot1.property_value' => ['required', 'string'],
            'plot1.finance_amount' => ['required', 'string'],
            'plot1.pai_rent' => ['required', 'string'],
            'plot1.licensed_purpose' => ['required', 'string'],
            'plot1.application_no' => ['required', 'string'],
            'plot1.plot_area_size' => ['required', 'string'],
            'plot1.pai_issue_date' => ['required', 'date'],
            'plot1.pai_expiry_Date' => ['required', 'date'],
            'plot1.pai_leasing_contract' => ['required', 'file', 'mimes:pdf,docx'],
            'plot1.fire_insurance_issue_date' => ['required', 'date'],
            'plot1.fire_insurance_expiry_Date' => ['required', 'date'],
            'plot1.fire_insurance_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'plot1.power_of_attorney_issue_date' => ['required', 'date'],
            'plot1.power_of_attorney_expiry_Date' => ['required', 'date'],
            'plot1.power_of_attorney_issue_to' => ['required', 'date'],
            'plot1.power_of_attorney_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'plot1.new_deal_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
            'plot1.poa_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
        ];
    }
    private function plot2Validations()
    {
        return [
            'plot2.plot_no' => ['required','unique:deals,plot_no'],
            'plot2.area_name' => ['required', 'string'],
            'plot2.block' => ['required', 'string'],
            'plot2.property_value' => ['required', 'string'],
            'plot2.finance_amount' => ['required', 'string'],
            'plot2.pai_rent' => ['required', 'string'],
            'plot2.licensed_purpose' => ['required', 'string'],
            'plot2.application_no' => ['required', 'string'],
            'plot2.plot_area_size' => ['required', 'string'],
            'plot2.pai_issue_date' => ['required', 'date'],
            'plot2.pai_expiry_Date' => ['required', 'date'],
            'plot2.pai_leasing_contract' => ['required', 'file', 'mimes:pdf,docx'],
            'plot2.fire_insurance_issue_date' => ['required', 'date'],
            'plot2.fire_insurance_expiry_Date' => ['required', 'date'],
            'plot2.fire_insurance_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'plot2.power_of_attorney_issue_date' => ['required', 'date'],
            'plot2.power_of_attorney_expiry_Date' => ['required', 'date'],
            'plot2.power_of_attorney_issue_to' => ['required', 'date'],
            'plot2.power_of_attorney_copy' => ['required', 'file', 'mimes:pdf,docx'],
            'plot2.new_deal_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
            'plot2.poa_email_attachment' => ['required', 'file', 'mimes:pdf,docx'],
        ];
    }
}
