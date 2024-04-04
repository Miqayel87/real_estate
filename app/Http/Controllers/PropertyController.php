<?php

namespace App\Http\Controllers;

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
        $newProperty = $this->propertyService->create($request);
        return redirect()->route('property.show', $newProperty->id);
    }

    public function destroy($id)
    {
        $this->propertyService->delete($id);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->propertyService->update($request, $id);
        return back();
    }

    public function edit($id)
    {
        $propertyToEdit = $this->propertyService->getById($id);

        $hasValueFeatures = $this->featureService->getFeaturesWithValue();
        $noValueFeatures = $this->featureService->getFeaturesWithNoValue();

        $types = PropertyType::all();

        return view('edit-property', [
            'property' => $propertyToEdit,
            "hasValueFeatures" => $hasValueFeatures,
            'noValueFeatures' => $noValueFeatures,
            "listingTypes" => $this->propertyService::LISTING_TYPES,
            "types" => $types
        ]);
    }
}
