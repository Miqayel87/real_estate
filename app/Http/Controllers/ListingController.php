<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Services\PropertyService;
use App\Services\FeatureService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    const CITIES = [
        "New York",
        "Los Angeles",
        "Chicago",
        "Brooklyn",
        "Queens",
        "Houston",
        "Manhattan",
        "Philadelphia",
        "Phoenix",
        "San Antonio",
        "Bronx",
        "San Diego",
        "Dallas",
        "San Jose"
    ];

    const STATES = [
        'Alabama',
        'Alaska',
        'Arizona',
        'Arkansas',
        'California',
        'Colorado',
        'Connecticut',
        'Delaware',
        'Florida',
        'Georgia',
        'Hawaii',
        'Idaho',
        'Illinois',
        'Indiana',
        'Iowa',
        'Kansas',
        'Kentucky',
        'Louisiana',
        'Maine',
        'Maryland',
        'Massachusetts',
        'Michigan',
        'Minnesota',
        'Mississippi',
        'Missouri',
        'Montana',
        'Nebraska',
        'Nevada',
        'New Hampshire',
        'New Jersey',
        'New Mexico',
        'New York',
        'North Carolina',
        'North Dakota',
        'Ohio',
        'Oklahoma',
        'Oregon',
        'Pennsylvania',
        'Rhode Island',
        'South Carolina',
        'South Dakota',
        'Tennessee',
        'Texas',
        'Utah',
        'Vermont',
        'Virginia',
        'Washington',
        'West Virginia',
        'Wisconsin',
        'Wyoming',
    ];

    const BEDROOMS = [
        1,
        2,
        3,
        4,
        5
    ];

    const BATHROOMS = [
        1,
        2,
        3,
        4,
        5
    ];

    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
    }

    public function index()
    {
        $properties = $this->propertyService->getAllWithPagination();
        $features = $this->featureService->getFeaturesWithNoValue();
        $types = Type::all();

        return view('listing', [
            'properties' => $properties,
            'features' => $features,
            'types' => $types,
            'listingTypes' => $this->propertyService::LISTING_TYPES,
            'searchOptions' => [
                'states' => self::STATES,
                'cities' => self::CITIES,
                'bedroomOptions' => self::BEDROOMS,
                'bathroomOptions' => self::BATHROOMS
            ]
        ]);
    }

    public function search(Request $request)
    {
        $properties = $this->propertyService->search($request);
        $features = $this->featureService->getFeaturesWithNoValue();
        $types = Type::all();
        $searchOptions = $request->all();

        return view('listing', [
            'properties' => $properties,
            'features' => $features,
            'types' => $types,
            'listingTypes' => $this->propertyService::LISTING_TYPES,
            'searchOptions' => array_merge([
                'states' => self::STATES,
                'cities' => self::CITIES,
                'bedroomOptions' => self::BEDROOMS,
                'bathroomOptions' => self::BATHROOMS
            ], $searchOptions)
        ]);
    }
}
