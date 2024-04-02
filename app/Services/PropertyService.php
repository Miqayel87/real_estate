<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyService
{
    const STATUS = [
        'active',
        'inactive'
    ];

    const LISTING_TYPES = [
        'For sale',
        'For rent'
    ];
    public function __construct(){
        $this->featureService = new FeatureService;
    }

    public function create($request)
    {
        $newProperty = new Property;

        $newProperty->fill([
            'title' => $request->title,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'price' => $request->price,
            'listing_type' => $request->listing_type,
            'status' => true,
            'type_id' => $request->type,
            'user_id' => Auth::user()->id,
        ]);

        $newProperty->save();

        foreach ($request->features as $key => $value){
            $this->featureService->create($key, $newProperty->id, $value);
        }

    }

    public function getAll(){
        return Property::orderBy('created_at','desc')->with('features')->get();
    }
}
