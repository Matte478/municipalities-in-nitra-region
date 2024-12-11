<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class FileDownloadException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::channel('import')->error($this->getMessage());
    }
}
