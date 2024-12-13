<?php

namespace App\Actions;

use App\Jobs\GeocodeCity;
use App\Models\City;

class GeocodeCities
{
    public function __invoke(): void
    {
        collect(City::all())->each(fn($city) => GeocodeCity::dispatch($city));
    }
}
