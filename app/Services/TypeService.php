<?php

namespace App\Services;


use App\Models\Feature;
use App\Models\Type;

class TypeService
{

    public function store($request)
    {
        $newType = new Type;

        $newType->fill($request->all());

        $newType->save();

        return $newType;
    }

    public function destroy($id)
    {
        $typeToDelete = Type::findOrFail($id);

        $typeToDelete->delete();

        return $typeToDelete;
    }

    public function update($request, $id)
    {
        $typeToUpdate = Type::findOrFail($id);

        $typeToUpdate->fill($request->all());

        $typeToUpdate->save();

        return $typeToUpdate;
    }


    public function getAll()
    {
        return Type::all();
    }
}
