<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /** @var ImageUploadService */
    private $imageUploadService;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->imageUploadService = new ImageUploadService;
    }

    /**
     * Store a new user.
     *
     * @param UserRequest $request The request data containing user details.
     * @return void
     */
    public function store(UserRequest $request): void
    {
        $newUser = new User;

        $newUser->fill($request->all());
        $newUser->password = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $image = new Image;
            $image->name = $this->imageUploadService->uploadAndResize($request->file('image'), '');
            $image->save();

            $newUser->image_id = $image->id;
        }

        $newUser->save();
    }

    /**
     * Update the currently logged-in user or a user with a specific ID.
     *
     * @param UserRequest $request The request data containing user details.
     * @return void
     */
    public function update(UserRequest $request): void
    {
        $userToEdit = $request->userId ? $this->getById($request->userId) : $this->getLoggedUser();
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
     * @return Authenticatable|null The currently logged-in user with associated image, or null if user not found.
     */
    public function getLoggedUser(): ?Authenticatable
    {
        return Auth::user();
    }

    /**
     * Get all users with associated images.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::with('image')->select(['id', 'username', 'name', 'title', 'phone', 'email', 'about', 'created_at', 'updated_at'])->get();
    }

    /**
     * Delete a user by ID.
     *
     * @param int $id The ID of the user to delete.
     * @return User The deleted user.
     */
    public function destroy(int $id): User
    {
        $userToDestroy = User::findOrFail($id);

        $userToDestroy->delete();

        return $userToDestroy;
    }

    /**
     * Get a user by ID.
     *
     * @param int $id The ID of the user to retrieve.
     * @return User The retrieved user.
     */
    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }
}
