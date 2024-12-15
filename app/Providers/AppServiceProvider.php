<?php

namespace App\Providers;

use App\DataProviders\GeocodingProvider\GeocodingProvider;
use App\DataProviders\GeocodingProvider\GoogleGeocodingProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            GeocodingProvider::class,
            function () {
                return match (config('app.geocoding_provider')) {
                    'google' => app(GoogleGeocodingProvider::class),
                };
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Http::macro('googleGeocode', function () {
            return Http::baseUrl(config('services.google_geocode.url'))
                ->withOptions([
                    'query' => [
                        'key' => config('services.google_geocode.api_key'),
                    ],
                ]);
        });
    }
}
