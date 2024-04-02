<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                "name" => "Apartment",
            ],
            [
                "name" => "House",
            ],
            [
                "name" => "Commercial",
            ],
            [
                "name" => "Garage",
            ],
            [
                "name" => "Lot",
            ],
        ];

        foreach ($types as $type) {
            PropertyType::create(
                [
                    "name" => $type['name'],
                ]
            );
        }
    }
}
