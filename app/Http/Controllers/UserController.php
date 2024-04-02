<?php

namespace App\Http\Controllers;

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

    public function update(Request $request){
        $this->userService->update($request);

        return back();
    }
}
