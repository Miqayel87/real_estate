<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Models\Feature;
use App\Models\PropertyType;
use App\Services\FeatureService;
use App\Services\LocationService;
use Illuminate\Http\Request;
use App\Services\PropertyService;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
        $this->loacationService = new LocationService;
    }

    public function show($id)
    {
        $property = $this->propertyService->getById($id);
        $location = $this->loacationService->getLatLong("$property->zip_code $property->address, $property->city , $property->state");

        return view('single-property', ['property' => $property, 'location' => $location]);
    }

    public function create()
    {
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

    public function store(Request $request)
    {
        $this->propertyService->create($request);
    }

    public function destroy($id){
        $this->propertyService->delete($id);
    }

    public function update(){

    }

    public function edit(){

    }
}
