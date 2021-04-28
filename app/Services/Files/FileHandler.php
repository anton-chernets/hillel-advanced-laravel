<?php


namespace App\Services\Files;

use Illuminate\Support\Facades\Storage;


class FileHandler
{
    public const FILE_NAME = 'json_convert_to.xml';

    public function writingToFile($fileContents): bool
    {
        return Storage::disk('local')->put(self::FILE_NAME, $fileContents);
    }
}
