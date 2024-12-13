<?php

namespace App\Actions;

use App\Exceptions\FileDownloadException;
use App\Exceptions\FileExistsException;
use App\Exceptions\InvalidExtensionException;
use Illuminate\Support\Facades\Storage;

class SaveFileFromUrl
{
    public function __invoke(string $url, string $publicPath, ?array $allowedExtensions = null): string
    {
        $filename = basename($url);

        if ($allowedExtensions) {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            if (! in_array($extension, $allowedExtensions, true)) {
                throw new InvalidExtensionException("The extension '{$extension}' is not allowed.");
            }
        }

        if (Storage::disk('public')->exists("{$publicPath}/{$filename}")) {
            throw new FileExistsException("The file '{$publicPath}/{$filename}' already exists.");
        }

        $content = file_get_contents($url);
        if ($content === false) {
            throw new FileDownloadException("Unable to download the file from '{$url}'.");
        }

        Storage::disk('public')->put("{$publicPath}/{$filename}", $content);

        return $filename;
    }
}
