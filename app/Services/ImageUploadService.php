<?php

namespace App\Services;

use App\Models\Image as ImageModel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * Upload and resize image.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param int $width
     * @param int $height
     * @param int $quality
     * @return string|null
     */
    public function uploadAndResize($file, $directory, $width = 100, $height = 100, $quality = 90)
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $originalPath = $file->storeAs($directory, $filename);
        $resizedImage = Image::make(asset('storage/'.$originalPath))
            ->fit($width, $height)
            ->encode($file->getClientOriginalExtension(), $quality);

        Storage::put($directory . 'public/resized/' . $filename, $resizedImage);

        $image = new ImageModel();
        $image->name = $originalPath;
        $image->save();

        return $image;
    }

}

