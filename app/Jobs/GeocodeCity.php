<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Actions\GeocodeCity as GeocodeCityAction;
use App\Models\City;

class GeocodeCity implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public City $city,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(GeocodeCityAction::class)($this->city);
    }
}
