<?php

namespace App\Console\Commands;

use App\Actions\GeocodeCities;
use Illuminate\Console\Command;

class GeocodeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geolocate all cities based on their address';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(GeocodeCities::class)();

        $this->info('Geocoding has been queued.');
    }
}
