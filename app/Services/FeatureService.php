<?php

namespace App\Services;
use App\Models\Feature;
use App\Models\PropertyFeature;

class FeatureService{
    const BUILDINGAGES  = [
        "0 - 1 Years",
        "0 - 5 Years",
        "0 - 10 Years",
        "0 - 20 Years",
        "0 - 50 Years",
        "50+ Years",
    ];

    const BEDROOMS  = [
        1,
        2,
        3,
        4,
        5
    ];

    const BATHROOMS  = [
        1,
        2,
        3,
        4,
        5
    ];

    const ROOMS  = [
        1,
        2,
        3,
        4,
        5,
        'More than 5'
    ];

    public function create($featureId, $propertyId, $value){
        $newPropertyFeature = new PropertyFeature;

        $newPropertyFeature->fill([
            "property_id" => $propertyId,
            "feature_id" => $featureId,
            "value" => $value
        ]);

        $newPropertyFeature->save();

        return $newPropertyFeature;
    }

    public function getAll(){
        return Feature::all();
    }

    public function getFeaturesWithValue(){
        $features = Feature::where('has_value', true)->get();
        $values = [];
        foreach ($features as $feature){
            switch ($feature->name){
                case 'Building Age':
                    $values[$feature->name] = self::BUILDINGAGES;
                    break;
                case 'Bedrooms':
                    $values[$feature->name] = self::BEDROOMS;
                    break;
                case 'Bathrooms':
                    $values[$feature->name] = self::BATHROOMS;
                    break;
                case 'Rooms':
                    $values[$feature->name] = self::ROOMS;
                    break;
            }
        }

        return [
            'features' => $features,
            'values' => $values
        ];
    }

    public function getFeaturesWithNoValue(){
        return Feature::where('has_value', false)->get();
    }

}
