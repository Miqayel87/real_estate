<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    public function __construct(){
        $this->propertyService = new PropertyService;
    }
    public function create(){
        return view('submit-property');
    }

    public function store(Request $request){
        $this->propertyService->create($request);
    }
}
