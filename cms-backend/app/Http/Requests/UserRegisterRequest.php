<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required',
            'permission_ids' => 'required|array',
            'password' => 'required'
        ];
        
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.email' => 'Please Provide Valid Email',
            'email.unique' => 'Email is already taken',
            'role_id.required' => 'Role is required',
            'permission_ids.required' => 'Permission is required',
            'password.required' => 'Password is required!'
        ];
    }
}
