<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'username.max' => 'The username may not be greater than :max characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'email.max' => 'The email may not be greater than :max characters.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',
            'password.regex' => 'The password format is invalid. It must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.'
        ];
    }

}
