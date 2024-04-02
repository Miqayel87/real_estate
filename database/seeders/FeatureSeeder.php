<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            [
                "name" => "Air Conditioning",
                "has_value" => false
            ],
            [
                "name" => "Swimming Pool",
                "has_value" => false
            ],
            [
                "name" => "Central Heating",
                "has_value" => false
            ],
            [
                "name" => "Laundry Room",
                "has_value" => false
            ],
            [
                "name" => "Gym",
                "has_value" => false
            ],
            [
                "name" => "Alarm",
                "has_value" => false
            ],
            [
                "name" => "Window Covering",
                "has_value" => false
            ],
            [
                "name" => "Bathrooms",
                "has_value" => true
            ],
            [
                "name" => "Bedrooms",
                "has_value" => true
            ],
            [
                "name" => "Building Age",
                "has_value" => true
            ],
            [
                "name" => "Area",
                "has_value" => true
            ],
            [
                "name" => "Rooms",
                "has_value" => true
            ]
        ];

        foreach ($features as $feature) {
            Feature::create(
                [
                    "name" => $feature['name'],
                    "has_value" => $feature['has_value']
                ]
            );
        }

    }
}
