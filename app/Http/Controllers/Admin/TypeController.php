<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Services\TypeService;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->typeService = new TypeService;
    }

    public function index()
    {
        $types = $this->typeService->getAll();
        return view('admin.type.types', ['types' => $types]);
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(TypeRequest $request)
    {
        $this->typeService->store($request);
        return redirect()->route('type.index');
    }

    public function destroy($id)
    {
        $this->typeService->destroy($id);
        return redirect()->route('type.index');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.type.edit', ['type' => $type]);
    }

    public function update(TypeRequest $request, $id)
    {
        $this->typeService->update($request, $id);
        return redirect()->route('type.index');
    }
}
