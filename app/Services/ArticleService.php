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
