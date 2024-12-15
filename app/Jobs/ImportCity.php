<?php

namespace App\Jobs;

use App\Actions\ImportCity as ImportCityAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ImportCity implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $url,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        app(ImportCityAction::class)($this->url);
    }
}
