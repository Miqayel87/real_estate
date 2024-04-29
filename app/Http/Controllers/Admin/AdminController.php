<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use App\Services\ArticleService;
use App\Services\FeatureService;
use App\Services\PropertyService;
use App\Services\TypeService;
use App\Services\UserService;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->userService = new UserService;
    }

    public function index()
    {
        return view('admin.home',['data' => [
            'propertyCount' => $this->propertyService->getAll()->count(),
            'userCount' => $this->userService->getAll()->count(),
        ]]);
    }
}
