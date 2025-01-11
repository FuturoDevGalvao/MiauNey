<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

class ImageHelper
{
    public static function deleteImage(string $path): bool
    {
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }

        throw new InvalidArgumentException("A imagem para o caminho '$path' não existe.");
    }

    public static function saveImage(UploadedFile $fileImage): string
    {
        $nameImage = 'image-' . uniqid() . '.' . $fileImage->getClientOriginalExtension();
        return $fileImage->storeAs(
            'uploads',
            $nameImage,
            env('FILESYSTEM_DISK', 'public')
        );
    }
}
