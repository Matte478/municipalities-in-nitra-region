<?php

namespace App\Actions;

use App\Jobs\ImportCity;
use App\Services\ScraperService;

class ImportCities
{
    public function __construct(
        public ScraperService $scraper,
    ) {}

    public function __invoke(): void
    {
        $subDistricts = $this->scraper->scrapeSubDistricts();
        $citiesList = collect($subDistricts)->map(fn($subDistrict) => $this->scraper->scrapeCities($subDistrict['url']))->flatten(1);

        collect($citiesList)->each(fn($city) => ImportCity::dispatch($city['url']));
    }
}
