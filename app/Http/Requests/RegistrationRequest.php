<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class RegistrationRequest extends FormRequest
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
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]+$/',
                'confirmed'
            ]
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => __('registration_validation.username.required'),
            'username.unique' => __('registration_validation.username.unique'),
            'username.max' => __('registration_validation.username.max'),
            'email.required' => __('registration_validation.email.required'),
            'email.email' => __('registration_validation.email.email'),
            'email.unique' => __('registration_validation.email.unique'),
            'email.max' => __('registration_validation.email.max'),
            'password.required' => __('registration_validation.password.required'),
            'password.string' => __('registration_validation.password.string'),
            'password.min' => __('registration_validation.password.min'),
            'password.regex' => __('registration_validation.password.regex'),
            'password.confirmed' => __('registration_validation.password.confirmed')
        ];
    }

}
