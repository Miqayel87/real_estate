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

        $file->storeAs('public'.$directory, $filename);

        $originalImagePath = storage_path('app/public'.$directory.'/'.$filename);

        $resizedImage = Image::make($originalImagePath)
            ->fit($width, $height)
            ->encode($file->getClientOriginalExtension(), $quality);

        Storage::put('public'.'/resized/'.$filename, $resizedImage->stream());

        $image = new ImageModel();
        $image->name = $filename;
        $image->save();

        return $image;
    }

    /**
     * Delete image and its resized version.
     *
     * @param string $filename
     * @param string $directory
     * @return void
     */
    public function deleteImage($filename, $directory)
    {
        Storage::delete('public'.$directory.'/'.$filename);

        Storage::delete('public'.'/resized/'.$filename);
    }
}
