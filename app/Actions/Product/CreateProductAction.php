<?php

namespace App\Actions\Product;

use App\Models\Product;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class CreateProductAction
 *
 * Action class responsible for creating a product in the system.
 *
 * @package App\Actions\Product
 */
class CreateProductAction
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Execute product creation process.
     *
     * @param string $sku
     * @param string $name
     * @param string $categoryName
     * @param float $price
     * @return Product|null
     * @throws ValidationException If validation fails.
     */
    public function execute(string $sku, string $name, string $categoryName, float $price): ?Product
    {

        $validator = Validator::make(
            ['sku' => $sku, 'name' => $name, 'categoryName' => $categoryName, 'price' => $price],
            ['sku' => 'required|string|min:1', 'name' => 'required|string|min:1', 'categoryName' => 'required|exists:categories,name', 'price' => 'required|numeric|min:1']
        );

        if ($validator->fails()) {
            throw new Exception($validator->messages());
        }

        // Find the category by name
        $category = $this->categoryRepository->findByName($categoryName);

        // Create a new product associated with the found category
        return $category->products()->create([
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
        ]);
    }
}
