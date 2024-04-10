<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getAll()
    {
        return Article::all();
    }
}
