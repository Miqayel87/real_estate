<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Services\PropertyService;
use App\Services\FeatureService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
    }

    public function index()
    {
        $properties = $this->propertyService->getAllWithPagination();
        $features = $this->featureService->getFeaturesWithNoValue();
        $types = PropertyType::all();

        return view('listing', [
            'properties' => $properties,
            'features' => $features,
            'types' => $types,
            'listingTypes' => $this->propertyService::LISTING_TYPES
        ]);
    }

    public function search(Request $request)
    {
        dd($request);
        $properties = $this->propertyService->search($request);
        return view('listing', ['properties' => $properties]);
    }
}
