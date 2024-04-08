<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Services\FeatureService;
use App\Services\PropertyService;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
    }

    public function index()
    {
        $properties = $this->propertyService->getN(5);
        $features = $this->featureService->getFeaturesWithNoValue();
        $types = PropertyType::all();

        return view('index', [
            'properties' => $properties,
            'features' => $features,
            'types' => $types,
            'listingTypes' => $this->propertyService::LISTING_TYPES
        ]);
    }
}
