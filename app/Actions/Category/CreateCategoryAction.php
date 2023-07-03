<?php

namespace App\Actions\Category;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CreateCategoryAction
{
    protected CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute($name)
    {
        $validator = Validator::make(
            ['name' => $name]
            , [
            'name' => 'required|string|unique:categories,name'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return $this->categoryRepository->create(['name' => $name]);
    }
}
