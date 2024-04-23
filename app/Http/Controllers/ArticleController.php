<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Article;
use App\Models\Property;
use App\Models\Type;
use App\Services\ArticleService;
use App\Services\FeatureService;
use App\Services\LocationService;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->articleService = new ArticleService;
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $this->articleService->store($request);
        return back();
    }

    public function destroy($id)
    {
        $this->articleService->destroy($id);
        return back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $this->articleService->update($request, $id);
        return back();
    }
}
