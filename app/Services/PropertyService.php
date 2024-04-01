<?php

namespace App\Services;

use App\Models\Property;

class PropertyService
{
    public function create($request)
    {
        $newProperty = new Property;

        $newProperty->fill($request->all());

        $newProperty->save();

//        if (isset($request['check'])) {
//            // Assuming you have a relationship to store property features
//            $newProperty->features()->createMany($request['check']);
//        }
    }
}
