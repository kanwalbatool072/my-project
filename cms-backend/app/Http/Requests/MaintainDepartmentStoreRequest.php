<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintainDepartmentStoreRequest extends FormRequest
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
            'department_name' => 'required|string',
            'cost_center' => 'required|string',
            'profit_center' => 'required|string',
            'start_date' => 'required',
            'address_line_1' => 'required|string',
            'mobile_number' => 'required'
        ];
    }
}
