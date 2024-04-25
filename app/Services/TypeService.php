<?php

namespace App\Services;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TypeService
 * @package App\Services
 */
class TypeService
{
    /**
     * Store a new type.
     *
     * @param TypeRequest $request
     * @return Type
     */
    public function store(TypeRequest $request): Type
    {
        $newType = new Type;

        $newType->fill($request->all());

        $newType->save();

        return $newType;
    }

    /**
     * Delete a type.
     *
     * @param int $id
     * @return Type
     */
    public function destroy(int $id): Type
    {
        $typeToDelete = Type::findOrFail($id);

        $typeToDelete->delete();

        return $typeToDelete;
    }

    /**
     * Update an existing type.
     *
     * @param TypeRequest $request
     * @param int $id
     * @return Type
     */
    public function update(TypeRequest $request, int $id): Type
    {
        $typeToUpdate = Type::findOrFail($id);

        $typeToUpdate->fill($request->all());

        $typeToUpdate->save();

        return $typeToUpdate;
    }

    /**
     * Get all types.
     *
     * @return Collection|Type[]
     */
    public function getAll(): Collection
    {
        return Type::all();
    }
}
