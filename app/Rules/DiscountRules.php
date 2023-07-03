<?php

namespace App\Rules;

class DiscountRules
{
    public const PRODUCT_CREATE_RULE = [
        'percentage' => 'required|numeric|min:0|max:100',
        'product_sku' => 'required|exists:products,sku',
    ];

    public const CATEGORY_CREATE_RULE = [
        'percentage' => 'required|numeric|min:0|max:100',
        'category_id' => 'required|exists:categories,id',
    ];


}
