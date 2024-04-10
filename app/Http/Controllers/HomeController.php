<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use App\Services\ArticleService;
use App\Services\FeatureService;
use App\Services\PropertyService;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->featureService = new FeatureService;
        $this->articleService = new ArticleService;
    }

    public function index()
    {
        $properties = $this->propertyService->getN(5);
        $popularPlaces = $this->propertyService->getPopularPlaces();
        $features = $this->featureService->getFeaturesWithNoValue();
        $types = Type::all();
        $articles = $this->articleService->getAll();

        return view('index', [
            'properties' => $properties,
            'features' => $features,
            'types' => $types,
            'listingTypes' => $this->propertyService::LISTING_TYPES,
            'popularPlaces' => $popularPlaces,
            'articles' => $articles
        ]);
    }
}
