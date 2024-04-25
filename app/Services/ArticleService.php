<?php

namespace App\Services;

use App\Http\Requests\ArticleRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Article;
use Illuminate\Http\Request;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService
{
    /**
     * Store a new article.
     *
     * @param ArticleRequest $request
     * @return Article
     */
    public function store(ArticleRequest $request): Article
    {
        $newArticle = new Article;

        $newArticle->fill($request->all());

        $newArticle->save();

        return $newArticle;
    }

    /**
     * Delete an article.
     *
     * @param int $id
     * @return Article
     */
    public function destroy(int $id): Article
    {
        $articleToDelete = Article::findOrFail($id);

        $articleToDelete->delete();

        return $articleToDelete;
    }

    /**
     * Update an existing article.
     *
     * @param ArticleRequest $request
     * @param int $id
     * @return Article
     */
    public function update(ArticleRequest $request, int $id): Article
    {
        $articleToUpdate = Article::findOrFail($id);

        $articleToUpdate->fill($request->all());

        $articleToUpdate->save();

        return $articleToUpdate;
    }

    /**
     * Get all articles.
     *
     * @return Collection|Article[]
     */
    public function getAll(): Collection
    {
        return Article::all();
    }
}
