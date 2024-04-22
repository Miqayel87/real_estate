<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    public function __construct()
    {
        $this->imageUploadService = new ImageUploadService;
    }

    /**
     * Update the currently logged-in user.
     *
     * @param UserRequest $request The request data containing user details.
     * @return void
     */
    public function update(UserRequest $request): void
    {
        $userToEdit = $this->getLoggedUser();

        $userToEdit->fill($request->all());

        if ($request->hasFile('image')) {
            $image = new Image;
            $image->name = $this->imageUploadService->uploadAndResize($request->file('image'), '');
            $image->save();

            $userToEdit->image_id = $image->id;
        }

        $userToEdit->save();
    }

    /**
     * Get the currently logged-in user.
     *
     * @return User|null The currently logged-in user with associated image, or null if user not found.
     */
    public function getLoggedUser(): ?User
    {
        return User::where('id', Auth::user()->id)->with('image')->first();
    }

    public function getAll(){
        //return User::all();
        return User::select(['id', 'username','name','title', 'phone', 'email', 'about', 'created_at', 'updated_at'])->get();

    }
}
