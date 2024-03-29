<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(RegistrationService $registrationService, LoginService $loginService)
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
    }

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function signUp(Request $request)
    {
        $newUser = $this->registrationService->signUp($request);
        return redirect()->intended('/');
    }
}
