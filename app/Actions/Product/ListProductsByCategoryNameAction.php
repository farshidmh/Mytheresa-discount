<?php

namespace App\Actions\Product;

use App\Repositories\Interface\ProductRepositoryInterface;
use App\Rules\ProductRules;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Exception;

/**
 * Class ListProductsByCategoryNameAction
 *
 * This action is responsible for fetching products from the repository,
 * with specified category name, then formatting the result.
 *
 * @version 1.0.0
 */
class ListProductsByCategoryNameAction
{
    private ProductRepositoryInterface $productRepository;

    private FormatProductsResultAction $formatProductsResultAction;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        FormatProductsResultAction $formatProductsResultAction
    )
    {
        $this->productRepository = $productRepository;
        $this->formatProductsResultAction = $formatProductsResultAction;
    }

    /**
     * Execute the action and return the result.
     *
     * @param string $categoryName The name of the category to get the product.
     * @param int $perPage The number of products per page.
     * @return LengthAwarePaginator
     */
    public function execute(string $categoryName, int $perPage = 5): LengthAwarePaginator
    {

        $validator = Validator::make(
            ['categoryName' => $categoryName, 'perPage' => $perPage],
            ProductRules::PRODUCT_LIST_BY_CATEGORY_RULE
        );

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        return $this->formatProductsResultAction->execute(
            $this->productRepository->getProductsByCategoryName($categoryName, $perPage)
        );
    }
}
