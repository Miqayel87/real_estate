<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Feature;
use App\Models\PropertyFeature;
use Illuminate\Database\Eloquent\Collection;

class FeatureService
{
    /**
     * Create or update a property feature.
     *
     * @param int $featureId The ID of the feature.
     * @param int $propertyId The ID of the property.
     * @param mixed $value The value of the feature.
     * @return PropertyFeature The created or updated property feature.
     */
    public function createOrUpdate(int $featureId, int $propertyId, $value): PropertyFeature
    {
        $propertyFeature = PropertyFeature::updateOrCreate(
            ['feature_id' => $featureId, 'property_id' => $propertyId],
            ['value' => $value]
        );

        return $propertyFeature;
    }

    /**
     * Get all features.
     *
     * @return Collection The collection of features.
     */
    public function getAll(): Collection
    {
        return Feature::all();
    }

    /**
     * Get features with their possible values.
     *
     * @return array An array containing features and their possible values.
     */
    public function getFeaturesWithValue(): array
    {
        $features = Feature::where('has_value', true)->get();
        $values = [];
        foreach ($features as $feature) {
            switch ($feature->name) {
                case 'Building Age':
                    $values[$feature->name] = Feature::BUILDING_AGES;
                    break;
                case 'Bedrooms':
                    $values[$feature->name] = Feature::BEDROOMS;
                    break;
                case 'Bathrooms':
                    $values[$feature->name] = Feature::BATHROOMS;
                    break;
                case 'Rooms':
                    $values[$feature->name] = Feature::ROOMS;
                    break;
            }
        }

        return [
            'features' => $features,
            'values' => $values
        ];
    }

    /**
     * Get features without values.
     *
     * @return Collection The collection of features without values.
     */
    public function getFeaturesWithNoValue(): Collection
    {
        return Feature::where('has_value', false)->get();
    }

    /**
     * Delete property features.
     *
     * @param int $propertyId The ID of the property.
     * @param array $features The IDs of the features to delete.
     * @return void
     */
    public function deletePropertyFeatures(int $propertyId, array $features): void
    {
        PropertyFeature::where('property_id', $propertyId)
            ->whereNotIn('feature_id', $features)
            ->delete();
    }

    /**
     * Get a feature by name.
     *
     * @param string $name The name of the feature.
     * @return Feature|null The feature with the given name, or null if not found.
     */
    public function getByName(string $name): ?Feature
    {
        return Feature::where('name', $name)->first();
    }

    public function store($request)
    {
        $newFeature = new Feature;

        $newFeature->fill($request->all());

        $newFeature->save();

        return $newFeature;
    }

    public function destroy($id)
    {
        $featureToDelete = Feature::findOrFail($id);

        $featureToDelete->delete();

        return $featureToDelete;
    }

    public function update($request, $id)
    {
        $featureToUpdate = Feature::findOrFail($id);

        $featureToUpdate->fill($request->all());

        $featureToUpdate->save();

        return $featureToUpdate;
    }
}
