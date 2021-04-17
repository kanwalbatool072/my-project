<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRegistrationStoreRequest extends FormRequest
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
            //
            'company_id' => 'required',
            'registration_name' => 'required|string',
            'registration_authority' => 'required|string',
            'registration_id' => 'required|string',
            'registration_date' => 'required',
            'expiry_date' => 'required',
        ];
    }
}
