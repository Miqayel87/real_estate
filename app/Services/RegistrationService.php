<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationService
{
    /**
     * @var LoginService
     */
    private $loginService;

    /**
     * RegistrationService constructor.
     *
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
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

        $this->loginService->login($request);

        return $newUser;
    }
}
