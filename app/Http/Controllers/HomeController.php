<?php

namespace App\Http\Controllers;

use App\Services\PropertyService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->propertyService = new PropertyService;
    }

    public function index(){
        $properties = $this->propertyService->getN(3);
        return view('index', ['properties' => $properties]);
    }
}
