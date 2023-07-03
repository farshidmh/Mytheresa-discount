<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Rules\CategoryRules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * CreateCategoryAction
 *
 * The CreateCategoryAction class encapsulates the logic to create a new category in the system.
 *
 * @package App\Actions\Category
 * @version 1.0.0
 *
 */
class CreateCategoryAction
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Execute the action to create a new category.
     *
     * This method uses the category repository to create a new category
     * in the system. It validates the provided category name before
     * proceeding with the creation.
     *
     * @param string $name The name of the category to be created.
     * @return Category The newly created category.
     *
     * @throws ValidationException If the validation of the category name fails.
     *
     * @version 1.0.0
     */
    public function execute(string $name): Category
    {
        $this->validateName($name);
        return $this->categoryRepository->create(['name' => $name]);
    }

    /**
     * Validate the provided category name.
     *
     * This method validates that the provided category name is not empty, is a string and is unique in the categories table.
     *
     * @param string $name The name to validate.
     * @return void
     *
     * @throws ValidationException If the validation fails.
     *
     * @version 1.0.0
     */
    protected function validateName(string $name): void
    {
        $validator = Validator::make(['name' => $name],
            CategoryRules::CATEGORY_CREATE_RULE
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

    }

}
