<?php

namespace app\Http\Controllers\api\v1;

use App\Actions\Category\CreateCategoryAction;
use App\Actions\Category\ListCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;


/**
 * This controller is responsible for handling category related requests.
 * Categories can be created, listed.
 * This decision is based on the provided document and the fact that this controller is of scope.
 */
class CategoryController extends Controller
{
    public function getCategories(ListCategoriesAction $action)
    {
        return $this->successResponse(
            ['categories' => $action->execute()],
            'Categories retrieved successfully'
        );
    }

    public function newCategory(CreateCategoryRequest $request, CreateCategoryAction $action)
    {
        $category = $action->execute($request->get('name'));
        return $this->successResponse(
            ['category' => $category],
            'Category created successfully'
        );
    }

}
