<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService{

    public function __construct(){
        $this->imageUploadService = new ImageUploadService;
    }

    public function update($request){
        $userToEdit = $this->getLoggedUser();

        $userToEdit->fill($request->all());

        if($request->hasFile('image')){
            $image = $this->imageUploadService->uploadAndResize($request->file('image'), 'public');

            $userToEdit->image_id = $image->id;
        }

        $userToEdit->save();
    }

    public function getLoggedUser(){
        return User::where('id', Auth::user()->id)->with('image')->first();
    }
}
