<?php

namespace App\Http\Requests;

use App\Services\FeatureService;
use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        $featureService = new FeatureService();

        $rules = [
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'listing_type' => 'required|string|max:255',
            'type' => 'required|numeric|min:0',
            'features' => 'required|array',
            'features.' . $featureService->getByName('Area')->id => 'required|numeric|min:0',
            'features.' . $featureService->getByName('Rooms')->id => 'required|string|min:0',
            'images' => $this->isMethod('POST') ? 'required|array' : ''
        ];

        return $rules;
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        $featureService = new FeatureService();

        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than :max characters.',
            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than :max characters.',
            'city.required' => 'The city field is required.',
            'city.string' => 'The city must be a string.',
            'city.max' => 'The city may not be greater than :max characters.',
            'state.required' => 'The state field is required.',
            'state.string' => 'The state must be a string.',
            'state.max' => 'The state may not be greater than :max characters.',
            'zip_code.required' => 'The zip code field is required.',
            'zip_code.string' => 'The zip code must be a string.',
            'zip_code.max' => 'The zip code may not be greater than :max characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least :min.',
            'listing_type.required' => 'The listing type field is required.',
            'listing_type.string' => 'The listing type must be a string.',
            'listing_type.max' => 'The listing type may not be greater than :max characters.',
            'type.required' => 'The type field is required.',
            'type.numeric' => 'The type must be a number.',
            'type.min' => 'The type must be at least :min.',
            'features.required' => 'The features field is required.',
            'features.array' => 'The features must be an array.',
            'features.' . $featureService->getByName('Area')->id . '.required' => 'The area feature is required.',
            'features.' . $featureService->getByName('Area')->id . '.numeric' => 'The area feature must be a number.',
            'features.' . $featureService->getByName('Area')->id . '.min' => 'The area feature value must be at least :min.',
            'features.' . $featureService->getByName('Rooms')->id . '.required' => 'The rooms feature is required.',
            'features.' . $featureService->getByName('Rooms')->id . '.string' => 'The rooms feature must be a string.',
            'features.' . $featureService->getByName('Rooms')->id . '.min' => 'The rooms feature value must be at least :min.',
            'images.required' => 'The images field is required for creating a new property.',
        ];
    }

}
