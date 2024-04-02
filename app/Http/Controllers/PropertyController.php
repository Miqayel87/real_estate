<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\PropertyType;
use App\Services\FeatureService;
use Illuminate\Http\Request;
use App\Services\PropertyService;

class PropertyController extends Controller
{

    public function __construct(){
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
    }

    public function create(){
        $hasValueFeatures = $this->featureService->getFeaturesWithValue();
        $noValueFeatures = $this->featureService->getFeaturesWithNoValue();

        $types = PropertyType::all();

        return view('submit-property', [
            "hasValueFeatures" => $hasValueFeatures,
            'noValueFeatures' => $noValueFeatures,
            "listingTypes" => $this->propertyService::LISTING_TYPES,
            "types" => $types
        ]);
    }

    public function store(Request $request){
        $this->propertyService->create($request);
    }
}
