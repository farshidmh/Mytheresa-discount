<?php

namespace App\Rules;

class ProductRules
{
    public const PRODUCT_CREATE_RULE = [
        'sku' => 'required|unique:products,sku',
        'name' => 'required',
        'category_name' => 'required|exists:categories,name',
        'price' => 'required|numeric|min:0'
    ];

    public const PRODUCT_LIST_BY_CATEGORY_RULE = [
        'categoryName' => 'required|exists:categories,name',
        'perPage' => 'integer|min:1'
    ];

    public const PRODUCT_LIST_BY_PRICE_LESS_THAN_RULE = [
        'price' => 'required|integer|min:1',
        'perPage' => 'integer|min:1'
    ];

}
