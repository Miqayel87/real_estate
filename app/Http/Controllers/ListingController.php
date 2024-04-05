<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
    }

    public function index()
    {
        $properties = $this->propertyService->getAllWithPagination();
        return view('listing', ['properties' => $properties]);
    }

    public function search(Request $request)
    {
        $properties = $this->propertyService->search($request);
        return view('listing', ['properties' => $properties]);
    }
}
