<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\Type;
use App\Services\FeatureService;
use App\Services\LocationService;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Exception\NotFoundException;

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
        $similarProperties = $this->propertyService->getSimilarProperties($id);

        return view('single-property', [
            'property' => $property,
            'location' => $location,
            'similarProperties' => $similarProperties,
            'listingTypes' => Property::LISTING_TYPES
        ]);
    }

    public function create()
    {
        App::setLocale('ru');

        $hasValueFeatures = $this->featureService->getFeaturesWithValue();
        $noValueFeatures = $this->featureService->getFeaturesWithNoValue();

        $types = Type::all();

        return view('submit-property', [
            "hasValueFeatures" => $hasValueFeatures,
            'noValueFeatures' => $noValueFeatures,
            "listingTypes" => Property::LISTING_TYPES,
            "types" => $types
        ]);
    }

    public function store(PropertyRequest $request)
    {
        $newProperty = $this->propertyService->create($request);
        return redirect()->route('property.show', $newProperty->id);
    }

    public function destroy($id)
    {
        $this->authorize('delete', $this->propertyService->getById($id));
        $this->propertyService->delete($id);
        return back();
    }

    public function update(PropertyRequest $request, $id)
    {
        $this->propertyService->update($request, $id);
        return redirect()->route('property.show', $id);
    }

    public function edit($id)
    {
        $propertyToEdit = $this->propertyService->getById($id);

        $this->authorize('update', $propertyToEdit);

        $hasValueFeatures = $this->featureService->getFeaturesWithValue();
        $noValueFeatures = $this->featureService->getFeaturesWithNoValue();

        $types = Type::all();

        return view('edit-property', [
            'property' => $propertyToEdit,
            "hasValueFeatures" => $hasValueFeatures,
            'noValueFeatures' => $noValueFeatures,
            "listingTypes" => Property::LISTING_TYPES,
            "types" => $types
        ]);
    }

    public function hide($id)
    {
        $this->authorize('hide', $this->propertyService->getById($id));
        $this->propertyService->hide($id);
        return back();
    }

    public function activate($id)
    {
        $this->authorize('activate', $this->propertyService->getById($id));
        $this->propertyService->activate($id);
        return back();
    }
}
