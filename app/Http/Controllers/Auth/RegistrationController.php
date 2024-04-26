<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
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

    public function showRegistrationForm(Request $request)
    {
        return view('registration');
    }

    public function signUp(RegistrationRequest $request)
    {
        $this->registrationService->signUp($request);
        $this->loginService->login($request);

        return redirect()->intended('/');
    }
}
