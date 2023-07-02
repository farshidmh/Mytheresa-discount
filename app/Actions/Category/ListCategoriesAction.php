<?php

namespace App\Actions\Category;

use App\Repositories\Interface\CategoryRepositoryInterface;

class ListCategoriesAction
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute()
    {
        return $this->categoryRepository->all();
    }
}
