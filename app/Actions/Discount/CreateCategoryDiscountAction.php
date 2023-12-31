<?php

namespace App\Actions\Discount;

use App\Models\Discount;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Rules\DiscountRules;
use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * Class CreateCategoryDiscountAction
 *
 * An action that handles the creation of a new discount for a category.
 *
 * @package App\Actions\Discount
 * @version 1.0.0
 */
class CreateCategoryDiscountAction
{

    private CategoryRepositoryInterface $categoryRepository;

    /**
     * CreateDiscountAction constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     * @version 1.0.0
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Executes the action to create a new discount a category and returns it.
     *
     * @param string $categoryName The ID of the category the discount applies to.
     * @param string $percentage The percentage of the discount.
     * @return Discount The newly created discount.
     * @throws Exception If the creation of the new discount fails.
     * @version 1.0.0
     */
    public function execute(string $categoryName, string $percentage): Discount
    {

        $validator = Validator::make(
            ['category_name' => $categoryName, 'percentage' => $percentage],
            DiscountRules::CATEGORY_CREATE_RULE
        );

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        try {
            return $this->categoryRepository->findByName($categoryName)->discounts()->firstOrCreate([
                'percentage' => $percentage,
            ]);
        } catch (Exception $e) {
            throw new Exception("Failed to create new discount: " . $e->getMessage());
        }

    }
}
