<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UserRequest;
use App\Services\RegistrationService;
use App\Services\UserService;

class UserController extends Controller
{

    public function __construct()
    {
        $this->userService = new UserService;
        $this->registrationService = new RegistrationService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view("admin.user.users", compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->userService->store($request);
        return redirect()->route('adminUser.index');
    }

    public function update(UserRequest $request)
    {
        $this->userService->update($request);

        return back();
    }

    public function edit($id)
    {
        $user = $this->userService->getById($id);
        return view('admin.user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return back();
    }
}
