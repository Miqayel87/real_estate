<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(){
        $this->userService = new UserService;
    }

    public function index(){
        $user = $this->userService->getLoggedUser();
        return view("my-profile", ['user' => $user]);
    }

    public function update(UserRequest $request){
        $this->userService->update($request);

        return back();
    }
}
