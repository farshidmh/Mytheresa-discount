<?php

namespace app\Http\Controllers\api\v1;

use App\Actions\Category\CreateCategoryAction;
use App\Actions\Category\ListCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\JsonResponse;


/**
 * This controller is responsible for handling category related requests.
 * Categories can be created, listed.
 * This decision is based on the provided document and the fact that this controller is of scope.
 */
class CategoryController extends Controller
{

    /**
     * Retrieve all categories from the database.
     *
     * This method uses the ListCategoriesAction to fetch all
     * categories from the database.
     *
     * @param ListCategoriesAction $action The action to list categories.
     * @return JsonResponse A JSON response containing all categories.
     *
     * @version 1.0.0
     */
    public function index(ListCategoriesAction $action)
    {
        return $this->successResponse(
            ['categories' => $action->execute()],
            'Categories retrieved successfully'
        );
    }

    /**
     * Create a new category.
     *
     * This method uses the CreateCategoryAction to create a new category.
     * The new category's name is taken from the CreateCategoryRequest.
     *
     * @param CreateCategoryRequest $request The request to create a new category.
     * @param CreateCategoryAction $action The action to create a new category.
     * @return JsonResponse A JSON response containing the new category.
     *
     * @version 1.0.0
     */
    public function store(CreateCategoryRequest $request, CreateCategoryAction $action)
    {
        try {
            $category = $action->execute($request->get('name'));
            return $this->successResponse(
                ['category' => $category],
                'Category created successfully',
                201
            );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 'Category creation failed', 500);
        }
    }

}
