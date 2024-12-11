<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Actions\ImportCity as ImportCityAction;

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
