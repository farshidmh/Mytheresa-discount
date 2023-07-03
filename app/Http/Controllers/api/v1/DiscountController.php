<?php

namespace App\Http\Controllers\api\v1;

use App\Actions\Discount\CreateCategoryDiscountAction;
use App\Actions\Discount\CreateProductDiscountAction;
use App\Actions\Discount\ListDiscountsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryDiscountRequest;
use App\Http\Requests\CreateProductDiscountRequest;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class DiscountController
 *
 * A controller to handle discounts related routes.
 *
 * @package App\Http\Controllers\api\v1
 * @version 1.0.0
 */
class DiscountController extends Controller
{
    protected ListDiscountsAction $listDiscountsAction;


    public function __construct(ListDiscountsAction $listDiscountsAction)
    {
        $this->listDiscountsAction = $listDiscountsAction;

    }

    /**
     * Gets all discounts.
     *
     * @return JsonResponse A JSON response containing all discounts.
     * @version 1.0.0
     */
    public function index()
    {
        return $this->successResponse(
            ['discounts' => $this->listDiscountsAction->execute()],
            'Discounts retrieved successfully'
        );
    }

    /**
     * Creates a new discount for a product.
     *
     * @param CreateProductDiscountAction $createProductDiscountAction An action to create a product discount.
     * @param CreateProductDiscountRequest $request The incoming request.
     * @return JsonResponse A JSON response containing the newly created discount or an error message.
     * @version 1.0.0
     */
    public function storeByProduct(
        CreateProductDiscountAction  $createProductDiscountAction,
        CreateProductDiscountRequest $request
    )
    {
        try {
            $discount = $createProductDiscountAction->execute($request->get('product_sku'), $request->get('percentage'));
            return $this->successResponse(
                ['discount' => $discount],
                'Discount created successfully',
                201
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), [], 422);
        }
    }

    /**
     * Creates a new discount for a category.
     *
     * @param CreateCategoryDiscountAction $createCategoryDiscountAction An action to create a category discount.
     * @param CreateCategoryDiscountRequest $request The incoming request.
     * @return JsonResponse A JSON response containing the newly created discount or an error message.
     * @version 1.0.0
     */
    public function storeByCategory(
        CreateCategoryDiscountAction  $createCategoryDiscountAction,
        CreateCategoryDiscountRequest $request
    )
    {
        try {
            $discount = $createCategoryDiscountAction->execute($request->get('category_name'), $request->get('percentage'));
            return $this->successResponse(
                ['discount' => $discount],
                'Discount created successfully',
                201
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), [], 422);
        }
    }

}
