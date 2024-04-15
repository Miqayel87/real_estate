<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->imageUploadService = new ImageUploadService;
    }

    public function upload(Request $request)
    {
        $newImage = new Image;

        $newImage->name = $this->imageUploadService->uploadAndResize($request->file('file'), '');
        $newImage->save();

        return response()->json(['id' => $newImage->id]);
    }

    public function delete($id)
    {
        $imageToDelete = Image::where('id', $id)->first();

        $this->imageUploadService->deleteImage($imageToDelete->name, '');

        $imageToDelete->delete();

        return response()->json(['id' => $imageToDelete->id]);
    }
}
