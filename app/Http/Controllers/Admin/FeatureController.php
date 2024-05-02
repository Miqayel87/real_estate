<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function index()
    {
        $features = $this->featureService->getAll();
        return view('admin.feature.features', compact('features'));
    }

    public function store(FeatureRequest $request)
    {
        $this->featureService->store($request);
        return redirect()->route('feature.index');
    }

    public function destroy($id)
    {
        $this->featureService->destroy($id);
        return redirect()->route('feature.index');
    }

    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(FeatureRequest $request, $id)
    {
        $this->featureService->update($request, $id);
        return redirect()->route('feature.index');
    }
}
