<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string'
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
            'name.required' => __('type_validation.name.required'),
            'name.max' => __('type_validation.name.max', ['max' => 255]),
            'name.string' => __('type_validation.name.string'),

            'description.required' => __('type_validation.description.required'),
            'description.max' => __('type_validation.description.max', ['max' => 255]),
            'description.string' => __('type_validation.description.string'),
        ];
    }
}
