<?php

namespace App\Actions\Discount;

use App\Models\Discount;
use App\Repositories\Interface\ProductRepositoryInterface;
use Exception;

/**
 * Class CreateProductDiscountAction
 *
 * An action that handles the creation of a new discount for a product.
 *
 * @package App\Actions\Discount
 * @version 1.0.0
 */
class CreateProductDiscountAction
{

    private ProductRepositoryInterface $productRepository;

    /**
     * CreateDiscountAction constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @version 1.0.0
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Executes the action to create a new discount a product and returns it.
     *
     * @param string $productSKU The SKU of the product the discount applies to.
     * @param string $percentage The percentage of the discount.
     * @return Discount The newly created discount.
     * @throws Exception If the creation of the new discount fails.
     * @version 1.0.0
     */
    public function execute(string $productSKU, string $percentage): Discount
    {

        try {
            return $this->productRepository->findBySKU($productSKU)->discounts()->firstOrCreate([
                'percentage' => $percentage,
            ]);
        } catch (Exception $e) {
            throw new Exception("Failed to create new discount: " . $e->getMessage());
        }

    }
}
