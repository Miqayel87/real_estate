<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Article;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService
{
    public function store($request)
    {
        $newArticle = new Article;

        $newArticle->fill($request->all());

        $newArticle->save();

        return $newArticle;
    }

    public function destroy($id)
    {
        $articleToDelete = Article::findOrFail($id);

        $articleToDelete->delete();

        return $articleToDelete;
    }

    public function update($request, $id)
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
