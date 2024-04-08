<?php

namespace App\Services;

class LocationService
{
    /**
     * Get latitude and longitude coordinates for a given address.
     *
     * @param string $address The address to get coordinates for.
     * @return array|null An array containing latitude and longitude coordinates, or null if coordinates couldn't be retrieved.
     */
    public function getLatLong(string $address): ?array
    {
        $formattedAddress = urlencode($address);
        $opts = [
            'http' => [
                'header' => 'User-Agent: PHP'
            ]
        ];
        $context = stream_context_create($opts);

        $url = "https://nominatim.openstreetmap.org/search?format=json&q={$formattedAddress}";
        $response = file_get_contents($url, false, $context);

        $data = json_decode($response);

        if ($data && !empty($data)) {
            $lat = $data[0]->lat;
            $lon = $data[0]->lon;

            return ["latitude" => $lat, "longitude" => $lon];
        } else {
            return null;
        }
    }
}
