<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->adminService = new AdminService;
    }

    public function index()
    {
        return view('admin.home');
    }

    public function tables()
    {
        $datas = [
            'properties' => $this->adminService->getProperties(),
            'features' => $this->adminService->getFeatures(),
            'articles' => $this->adminService->getArticles(),
            'types' => $this->adminService->getTypes(),
            'users' => $this->adminService->getUsers(),
        ];

        return view('admin.tables', ['datas' => $datas]);
    }

    public function forms()
    {
        return view('admin.forms');
    }
}
