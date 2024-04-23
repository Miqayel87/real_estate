<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\Request;

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

    public function store(Request $request)
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

    public function update(Request $request, $id)
    {
        $this->typeService->update($request, $id);
        return back();
    }
}
