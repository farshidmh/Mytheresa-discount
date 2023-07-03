<?php

namespace App\Rules;

class CategoryRules
{
    public const CATEGORY_CREATE_RULE = [
        'name' => 'required|string|unique:categories,name',
    ];



}
