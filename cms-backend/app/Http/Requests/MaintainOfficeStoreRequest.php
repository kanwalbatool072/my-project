<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintainOfficeStoreRequest extends FormRequest
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
            'office_name' => 'required|string',
            'cost_center_code' => 'required|string',
            'profit_center_code' => 'required|string',
            'address_line_1' => 'required|string',
            'mobile_number' => 'required'
        ];
    }
}
