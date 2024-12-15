<?php

namespace App\DataProviders\GeocodingProvider\Classes;

class Coordinates
{
    public function __construct(
        public float $latitude,
        public float $longitude,
    ) {}
}
