<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'title' => 'Luxury Penthouse',
                'address' => 'Amphitheatre Parkway',
                'city' => 'Mountain View',
                'state' => 'CA',
                'zip_code' => '1600',
                'description' => 'An exquisite penthouse with breathtaking views.',
                'price' => 150000.00,
                'listing_type' => 1,
                'status' => true,
                'type_id' => 1,
                'user_id' => 3,
            ],
            [
                'title' => 'Downtown Condo',
                'address' => '101 Market Street',
                'city' => 'San Francisco',
                'state' => 'CA',
                'zip_code' => '94105',
                'description' => 'A modern condo in the heart of the city.',
                'price' => 80000.00,
                'listing_type' => 0,
                'status' => true,
                'type_id' => 2,
                'user_id' => 4,
            ],
            [
                'title' => 'Beachfront Villa',
                'address' => '23 Ocean Drive',
                'city' => 'Miami',
                'state' => 'FL',
                'zip_code' => '33139',
                'description' => 'A stunning villa overlooking the ocean.',
                'price' => 250000.00,
                'listing_type' => 1,
                'status' => true,
                'type_id' => 1,
                'user_id' => 5,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
