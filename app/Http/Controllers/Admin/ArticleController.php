<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Services\ArticleService;


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

    public function index()
    {
        $articles = $this->articleService->getAll();
        return view('admin.article.articles', compact('articles'));
    }

    public function store(ArticleRequest $request)
    {
        $this->articleService->store($request);
        return redirect()->route('article.index');
    }

    public function destroy($id)
    {
        $this->articleService->destroy($id);
        return redirect()->route('article.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->articleService->update($request, $id);
        return redirect()->route('article.index');
    }
}
