<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'content' => 'required|max:255|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('article_validation.name.required'),
            'name.max' => __('article_validation.name.max', ['max' => 255]),
            'name.string' => __('article_validation.name.string'),

            'content.required' => __('article_validation.content.required'),
            'content.max' => __('article_validation.content.max', ['max' => 255]),
            'content.string' => __('article_validation.content.string'),
        ];
    }

}
