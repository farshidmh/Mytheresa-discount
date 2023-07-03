<?php

namespace app\Http\Controllers\api\v1;

use App\Actions\Product\ListAllProductsAction;
use App\Actions\Product\ListProductsByCategoryNameAction;
use App\Actions\Product\ListProductsByPriceLessThanAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController
 * This controller handles all product-related requests.
 *
 * @version 1.0.0
 */
class ProductController extends Controller
{
    /**
     * Items per page for pagination
     */
    private const PER_PAGE = 5;

    /**
     * Handles request to fetch all products.
     *
     * @param ListAllProductsAction $listProductsAction
     * @return JsonResponse
     */
    public function getAllProducts(ListAllProductsAction $listProductsAction)
    {
        $products = $listProductsAction->execute(self::PER_PAGE);
        return $this->successResponse($products, 'Products retrieved successfully.');
    }

    /**
     * Handles request to fetch products by category name.
     *
     * @param string $categoryName
     * @param ListProductsByCategoryNameAction $listProductsAction
     * @return JsonResponse
     */
    public function getProductsByCategoryName(
        string                           $categoryName,
        ListProductsByCategoryNameAction $listProductsAction
    )
    {
        $validator = Validator::make(
            ['categoryName' => $categoryName],
            ['categoryName' => 'required|exists:categories,name',]
        );

        if ($validator->fails()) {
            return $this->errorResponse(null, $validator->errors(), 422);
        }

        $products = $listProductsAction->execute($categoryName, self::PER_PAGE);
        return $this->successResponse($products, 'Products retrieved successfully.');
    }

    /**
     * Handles request to fetch products with a price less than a specified amount.
     *
     * @param int $price
     * @param ListProductsByPriceLessThanAction $byPriceLessThanAction
     * @return JsonResponse
     */
    public function getProductsByPrice(
        int                               $price,
        ListProductsByPriceLessThanAction $byPriceLessThanAction
    )
    {
        $validator = Validator::make(
            ['price' => $price],
            ['price' => 'int|min:1']
        );

        if ($validator->fails()) {
            return $this->errorResponse(null, $validator->errors(), 422);
        }

        $products = $byPriceLessThanAction->execute($price, self::PER_PAGE);
        return $this->successResponse($products, 'Products retrieved successfully.');

    }


}
