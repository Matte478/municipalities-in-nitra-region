<?php

namespace App\DataProviders\GeocodingProvider;

use App\DataProviders\GeocodingProvider\Classes\Coordinates;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleGeocodingProvider implements GeocodingProvider
{
    public function getCoordinates(string $address): ?Coordinates
    {
        $response = Http::googleGeocode()->get('/json', [
            'address' => $address,
        ]);

        if (isset($response['error_message'])) {
            Log::channel('geocoding')->error($response['error_message']);

            return null;
        }

        $location = $response['results'][0]['geometry']['location'] ?? null;

        if (!$location) {
            return null;
        }

        return new Coordinates($location['lat'], $location['lng']);
    }
}
