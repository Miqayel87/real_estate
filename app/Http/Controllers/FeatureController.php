<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureRequest;
use App\Models\Feature;
use App\Services\FeatureService;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->featureService = new FeatureService;
    }

    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(FeatureRequest $request)
    {
        $this->featureService->store($request);
        return back();
    }

    public function destroy($id)
    {
        $this->featureService->destroy($id);
        return back();
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit', ['feature' => $feature]);
    }

    public function update(FeatureRequest $request, $id)
    {
        $this->featureService->update($request, $id);
        return back();
    }
}
