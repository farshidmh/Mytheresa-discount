<?php

namespace App\Actions\Category;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CreateCategoryAction
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|unique:categories,name'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return $this->categoryRepository->create($data);
    }
}
