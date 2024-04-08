<?php

namespace App\Services;

use App\Models\Image as ImageModel;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * Upload and resize image.
     *
     * @param UploadedFile $file The uploaded file.
     * @param string $directory The directory to upload the image.
     * @param int $width The width of the resized image (default: 800).
     * @param int $height The height of the resized image (default: 800).
     * @param int $quality The quality of the resized image (default: 95).
     * @return ImageModel|null The uploaded image model instance, or null on failure.
     */
    public function uploadAndResize(UploadedFile $file, string $directory, int $width = 800, int $height = 800, int $quality = 95): ?ImageModel
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public' . $directory, $filename);

        $originalImagePath = storage_path('app/public' . $directory . '/' . $filename);

        $resizedImage = Image::make($originalImagePath)
            ->fit($width, $height)
            ->encode($file->getClientOriginalExtension(), $quality);

        Storage::put('public' . '/resized/' . $filename, $resizedImage->stream());

        $image = new ImageModel();
        $image->name = $filename;
        $image->save();

        return $image;
    }

    /**
     * Delete image and its resized version.
     *
     * @param string $filename The filename of the image to delete.
     * @param string $directory The directory where the image is stored.
     * @return void
     */
    public function deleteImage(string $filename, string $directory): void
    {
        Storage::delete('public' . $directory . '/' . $filename);
        Storage::delete('public' . '/resized/' . $filename);
    }
}
