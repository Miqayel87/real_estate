<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($this->loginService->login($request)) {
            return redirect()->intended('/');
        }

        return back()->withInput($request->only('email'))
            ->withErrors([
                'login' => 'These credentials do not match our records.',
            ]);
    }

    public function logout()
    {
        $this->loginService->logout();
        return redirect()->route('login');
    }
}
