<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Services\TypeService;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->typeService = new TypeService;
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(TypeRequest $request)
    {
        $this->typeService->store($request);
        return back();
    }

    public function destroy($id)
    {
        $this->typeService->destroy($id);
        return back();
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.type.edit', ['type' => $type]);
    }

    public function update(TypeRequest $request, $id)
    {
        $this->typeService->update($request, $id);
        return back();
    }
}
