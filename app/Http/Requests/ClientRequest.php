<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=> ['required'],
            'address'=> ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'id_type' => ['required'],
            'id_no' => ['required'],
            'id_expiry' => ['required', 'date'],
            'id_attachment' => ['required', 'file', 'mimes:pdf,docx']
        ];
    }

    private function validatePutRequest()
    {
        return [
            'name'=> ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'id_type' => ['required'],
            'id_no' => ['required'],
            'id_expiry' => ['required', 'date'],
            'id_attachment' => ['file', 'mimes:pdf,docx']
        ];
    }
}
