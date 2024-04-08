<?php

namespace App\Services;

use App\Models\Feature;
use App\Models\PropertyFeature;
use Illuminate\Database\Eloquent\Collection;

class FeatureService
{
    const BUILDING_AGES = [
        "0 - 1 Years",
        "0 - 5 Years",
        "0 - 10 Years",
        "0 - 20 Years",
        "0 - 50 Years",
        "50+ Years",
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

    const ROOMS = [
        1,
        2,
        3,
        4,
        5,
        'More than 5'
    ];

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
                    $values[$feature->name] = self::BUILDING_AGES;
                    break;
                case 'Bedrooms':
                    $values[$feature->name] = self::BEDROOMS;
                    break;
                case 'Bathrooms':
                    $values[$feature->name] = self::BATHROOMS;
                    break;
                case 'Rooms':
                    $values[$feature->name] = self::ROOMS;
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
}
