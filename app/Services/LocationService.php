<?php

namespace App\Services;

class LocationService
{
    function getLatLong($address)
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
