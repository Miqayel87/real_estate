<?php

namespace App\Http\Requests;

use App\Services\FeatureService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

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
            'imageIds' => $this->isMethod('POST') ? 'required|array' : ''
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
            'title.required' => __('property_validation.title.required'),
            'title.string' => __('property_validation.title.string'),
            'title.max' => __('property_validation.title.max'),
            'address.required' => __('property_validation.address.required'),
            'address.string' => __('property_validation.address.string'),
            'address.max' => __('property_validation.address.max'),
            'city.required' => __('property_validation.city.required'),
            'city.string' => __('property_validation.city.string'),
            'city.max' => __('property_validation.city.max'),
            'state.required' => __('property_validation.state.required'),
            'state.string' => __('property_validation.state.string'),
            'state.max' => __('property_validation.state.max'),
            'zip_code.required' => __('property_validation.zip_code.required'),
            'zip_code.string' => __('property_validation.zip_code.string'),
            'zip_code.max' => __('property_validation.zip_code.max'),
            'description.required' => __('property_validation.description.required'),
            'description.string' => __('property_validation.description.string'),
            'price.required' => __('property_validation.price.required'),
            'price.numeric' => __('property_validation.price.numeric'),
            'price.min' => __('property_validation.price.min'),
            'listing_type.required' => __('property_validation.listing_type.required'),
            'listing_type.string' => __('property_validation.listing_type.string'),
            'listing_type.max' => __('property_validation.listing_type.max'),
            'type.required' => __('property_validation.type.required'),
            'type.numeric' => __('property_validation.type.numeric'),
            'type.min' => __('property_validation.type.min'),
            'features.required' => __('property_validation.features.required'),
            'features.array' => __('property_validation.features.array'),
            'features.' . $featureService->getByName('Area')->id . '.required' => __('property_validation.area_feature.required'),
            'features.' . $featureService->getByName('Area')->id . '.numeric' => __('property_validation.area_feature.numeric'),
            'features.' . $featureService->getByName('Area')->id . '.min' => __('property_validation.area_feature.min'),
            'features.' . $featureService->getByName('Rooms')->id . '.required' => __('property_validation.rooms_feature.required'),
            'features.' . $featureService->getByName('Rooms')->id . '.string' => __('property_validation.rooms_feature.string'),
            'features.' . $featureService->getByName('Rooms')->id . '.min' => __('property_validation.rooms_feature.min'),
            'imageIds.required' => __('property_validation.imageIds.required'),
        ];
    }

}
