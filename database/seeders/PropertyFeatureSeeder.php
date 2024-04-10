<?php

namespace Database\Seeders;

use App\Models\PropertyFeature;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\Feature;

class PropertyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyFeatures = [
            [
                'property_id' => 1,
                'feature_id' => 11,
                'value' => 123,
            ],
            [
                'property_id' => 1,
                'feature_id' => 3,
                'value' => null,
            ],
            [
                'property_id' => 1,
                'feature_id' => 2,
                'value' => null,
            ],
            [
                'property_id' => 2,
                'feature_id' => 4,
                'value' => null,
            ],
            [
                'property_id' => 2,
                'feature_id' => 11,
                'value' => 478,
            ],
            [
                'property_id' => 2,
                'feature_id' => 5,
                'value' => true,
            ],
            [
                'property_id' => 3,
                'feature_id' => 11,
                'value' => 500,
            ],
            [
                'property_id' => 3,
                'feature_id' => 3,
                'value' => true,
            ],

        ];

        foreach ($propertyFeatures as $propertyFeature) {
            $newPropertyFeature = new PropertyFeature;

            $newPropertyFeature->property_id = $propertyFeature['property_id'];
            $newPropertyFeature->feature_id = $propertyFeature['feature_id'];
            $newPropertyFeature->value = $propertyFeature['value'];

            $newPropertyFeature->save();
        }
    }
}
