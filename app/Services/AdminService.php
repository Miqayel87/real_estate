<?php

namespace App\Services;

use App\Models\Type;

class AdminService
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
        $this->userService = new UserService;
        $this->articleService = new ArticleService;
        $this->typeService = new TypeService;
        $this->featureService = new FeatureService;
    }

    public function getProperties()
    {
        return $this->propertyService->getAll();
    }

    public function getFeatures()
    {
        return $this->featureService->getAll();
    }

    public function getUsers()
    {
        return $this->userService->getAll();
    }

    public function getTypes()
    {
        return $this->typeService->getAll();
    }

    public function getArticles()
    {
        return $this->articleService->getAll();
    }
}
