<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
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
                "description" => "An apartment is a self-contained housing unit that occupies part of a building.",
            ],
            [
                "name" => "House",
                "description" => "A house is a single-family residential building typically consisting of one or more floors.",
            ],
            [
                "name" => "Commercial",
                "description" => "Commercial properties are buildings or land intended for profit-making activities, such as offices, retail stores, or warehouses.",
            ],
            [
                "name" => "Garage",
                "description" => "A garage is a structure designed to house motor vehicles or other vehicles.",
            ],
            [
                "name" => "Lot",
                "description" => "A lot refers to a piece of land that is empty or has minimal structures and is typically used for development or parking.",
            ],
        ];


        foreach ($types as $type) {
            Type::create(
                [
                    "name" => $type['name'],
                    "description" => $type['description'],
                ]
            );
        }
    }
}
