<?php

namespace app\Http\Controllers\api\v1;

use App\Actions\Product\ListAllProductsAction;
use App\Actions\Product\ListProductsByCategoryNameAction;
use App\Actions\Product\ListProductsByPriceLessThanAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    private int $perPage = 5;

    public function getAllProducts(ListAllProductsAction $listProductsAction)
    {
        $products = $listProductsAction->execute($this->perPage);
        return $this->successResponse($products, 'Products retrieved successfully.');
    }

    public function getProductsByName(
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

        $products = $listProductsAction->execute($categoryName, $this->perPage);
        return $this->successResponse($products, 'Products retrieved successfully.');
    }

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

        $products = $byPriceLessThanAction->execute($price, $this->perPage);
        return $this->successResponse($products, 'Products retrieved successfully.');

    }


}
