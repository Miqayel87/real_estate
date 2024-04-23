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
        $this->articleService = new ArticleService;
        $this->typeService = new TypeService;
        $this->featureService = new FeatureService;
    }

    public function index()
    {
        return view('admin.home');
    }

    public function tables()
    {
        $datas = [
            'property' => $this->propertyService->getAll(),
            'feature' => $this->featureService->getAll(),
            'article' => $this->articleService->getAll(),
            'type' => $this->typeService->getAll(),
            'user' => $this->userService->getAll(),
        ];

        return view('admin.tables', ['datas' => $datas]);
    }

    public function forms()
    {
        return view('admin.forms');
    }
}
