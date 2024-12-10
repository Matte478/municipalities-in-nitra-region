<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities and municipalities located in Nitra';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
