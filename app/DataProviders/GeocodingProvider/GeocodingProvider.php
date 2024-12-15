<?php

namespace App\DataProviders\GeocodingProvider;

use App\DataProviders\GeocodingProvider\Classes\Coordinates;

interface GeocodingProvider
{
    public function getCoordinates(string $address): ?Coordinates;
}
