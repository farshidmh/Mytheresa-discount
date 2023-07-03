<?php

namespace App\Actions\Product;

use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ListAllProductsAction
 *
 * This action is responsible for fetching all products from the repository, then formatting the result.
 *
 * @version 1.0.0
 */
class ListAllProductsAction
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
     * @param int $perPage The number of products per page.
     * @return LengthAwarePaginator
     */
    public function execute(int $perPage = 5): LengthAwarePaginator
    {
        return $this->formatProductsResultAction->execute(
            $this->productRepository->all($perPage)
        );
    }
}
