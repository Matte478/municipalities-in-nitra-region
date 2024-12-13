<?php

namespace App\Actions;

use App\DataProviders\GeocodingProvider\GeocodingProvider;
use App\Models\City;

class GeocodeCity
{
    public function __invoke(City $city): void
    {
        $coordinates = app(GeocodingProvider::class)->getCoordinates($city->city_hall_address);

        if (!$coordinates) {
            return;
        }

        $city->update([
            'latitude' => $coordinates->latitude,
            'longitude' => $coordinates->longitude,
        ]);
    }
}
