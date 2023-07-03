<?php

namespace App\Actions\Category;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ListCategoriesAction
 * @package App\Actions\Category
 * @version 1.0.0
 */
class ListCategoriesAction
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * return all categories
     *
     * @return Collection
     *
     * @version 1.0.0
     */
    public function execute(): Collection
    {
        return $this->categoryRepository->all();
    }
}
