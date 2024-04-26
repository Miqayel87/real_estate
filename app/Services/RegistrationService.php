<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationService
{
    /**
     * RegistrationService constructor.
     */
    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    /**
     * Sign up a new user.
     *
     * @param Request $request
     * @return User
     */
    public function signUp(Request $request): User
    {
        $newUser = new User;

        $newUser->fill([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $newUser->save();

        return $newUser;
    }
}
