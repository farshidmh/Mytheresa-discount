<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{

    public function create(array $data): Product
    {
        // TODO: Implement create() method.
    }

    public function all(int $perPage = 5): LengthAwarePaginator
    {
        return Product::paginate($perPage);
    }

    public function findBySKU(string $sku): ?Product
    {
        return Product::where('sku', $sku)->firstOrFail();
    }

    public function getProductsByCategoryName(string $categoryName, int $perPage = 5): LengthAwarePaginator
    {
        return Product::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->paginate($perPage);
    }

    public function getProductsByPriceLessThan(int $price, int $perPage = 5): LengthAwarePaginator
    {
        return Product::where('price', '<=', $price)->paginate($perPage);
    }
}
