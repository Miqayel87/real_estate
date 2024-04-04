<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\ImageUploadService;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->imageUploadService = new ImageUploadService;
    }

    public function delete($id)
    {
        $imageToDelete = Image::where('id', $id)->first();

        $this->imageUploadService->deleteImage($imageToDelete->name, '');

        $imageToDelete->delete();

        return back();
    }
}
