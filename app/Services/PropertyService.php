<?php

namespace App\Services;

use App\Models\Property;
use App\Models\PropertyImage;
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

    public function __construct()
    {
        $this->featureService = new FeatureService;
        $this->imageUploadService = new ImageUploadService;
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

        foreach ($request->features as $key => $value) {
            $this->featureService->createOrUpdate($key, $newProperty->id, $value);
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedImage = $this->imageUploadService->uploadAndResize($image, '');

                $propertyImage = new PropertyImage;
                $propertyImage->image_id = $uploadedImage->id;
                $propertyImage->property_id = $newProperty->id;
                $propertyImage->save();
            }
        }

        return $newProperty;
    }

    public function update($request, $id){
        $propertyToUpdate = $this->getById($id);

        $propertyToUpdate->fill([
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

        $propertyToUpdate->save();

        $this->featureService->deletePropertyFeatures($id, array_keys($request->features));

        foreach ($request->features as $key => $value) {
            $this->featureService->createOrUpdate($key, $propertyToUpdate->id, $value);
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedImage = $this->imageUploadService->uploadAndResize($image, '');

                $propertyImage = new PropertyImage;
                $propertyImage->image_id = $uploadedImage->id;
                $propertyImage->property_id = $propertyToUpdate->id;
                $propertyImage->save();
            }
        }

        return $propertyToUpdate;
    }

    public function delete($id)
    {
        $propertyToDelete = Property::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $propertyToDelete->status = 0;
        $propertyToDelete->save();
        return $propertyToDelete;
    }

    public function getAll()
    {
        return Property::orderBy('created_at', 'desc')->with('features')->with('images')->where('status', 1)->get();
    }

    public function getById($id)
    {
        return Property::where('id', $id)->with('features')->with('images')->with('type')->where('status', 1)->first();
    }

    public function getN($n)
    {
        return Property::with('features')->with('images')->where('status', 1)->limit($n)->get();
    }
}
