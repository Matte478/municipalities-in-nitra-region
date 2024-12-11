<?php

namespace App\Actions;

use App\Exceptions\FileExistsException;
use App\Models\City;
use App\Services\ScraperService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ImportCity
{
    public function __invoke(string $url): void
    {
        $cityData = app(ScraperService::class)->scrapeCity($url);

        if ($cityData['coat_of_arms']) {
            $publicFolder = "coat_of_arms";
            try {
                $filename = app(SaveFileFromUrl::class)($cityData['coat_of_arms'], $publicFolder, ['jpg', 'jpeg', 'png', 'gif']);
                $cityData['coat_of_arms_path'] = "/$publicFolder/{$filename}";
            } catch (FileExistsException) {
            } catch (Throwable) {
                Log::channel('import')->error("Unable to download coat of arms for {$cityData['name']} from {$cityData['coat_of_arms']}.");
            }
        }

        City::updateOrCreate(
            ['name' => $cityData['name']],
            $cityData,
        );
    }
}
