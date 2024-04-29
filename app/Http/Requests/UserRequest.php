<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->userId ?? (Auth::user() ? Auth::user()->id : '')),
            ],
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => [
                'email',
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->userId ?? (Auth::user() ? Auth::user()->id : '')),
            ],
            'about' => 'nullable|string',
            'image_id' => 'nullable|exists:images,id'
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
            'username.required' => __('user_validation.username.required'),
            'username.string' => __('user_validation.username.string'),
            'username.max' => __('user_validation.username.max'),
            'username.unique' => __('user_validation.username.unique'),
            'name.string' => __('user_validation.name.string'),
            'name.max' => __('user_validation.name.max'),
            'title.string' => __('user_validation.title.string'),
            'title.max' => __('user_validation.title.max'),
            'phone.string' => __('user_validation.phone.string'),
            'phone.max' => __('user_validation.phone.max'),
            'email.required' => __('user_validation.email.required'),
            'email.string' => __('user_validation.email.string'),
            'email.email' => __('user_validation.email.email'),
            'email.max' => __('user_validation.email.max'),
            'email.unique' => __('user_validation.email.unique'),
            'about.string' => __('user_validation.about.string'),
            'image_id.exists' => __('user_validation.image_id.exists'),
        ];
    }
}
