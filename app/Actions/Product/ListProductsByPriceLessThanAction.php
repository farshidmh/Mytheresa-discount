<?php

namespace App\Actions\Product;

use App\Repositories\Interface\ProductRepositoryInterface;
use App\Rules\ProductRules;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Exception;


/**
 * Class ListProductsByPriceLessThanAction
 *
 * This action is responsible for fetching products from the repository,
 * with a price less than a given value, then formatting the result.
 *
 * @version 1.0.0
 */
class ListProductsByPriceLessThanAction
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
     * @param int $price The upper limit of the product price.
     * @param int $perPage The number of products per page.
     * @return LengthAwarePaginator
     */
    public function execute(int $price, int $perPage = 5): LengthAwarePaginator
    {

        $validator = Validator::make(
            ['price' => $price, 'perPage' => $perPage],
            ProductRules::PRODUCT_LIST_BY_PRICE_LESS_THAN_RULE
        );

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        return $this->formatProductsResultAction->execute(
            $this->productRepository->getProductsByPriceLessThan($price, $perPage)
        );
    }
}
