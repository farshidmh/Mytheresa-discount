<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements Interface\ProductRepositoryInterface
{

    public function find(int $id): ?Product
    {
        // TODO: Implement find() method.
    }

    public function create(array $data): Product
    {
        // TODO: Implement create() method.
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Product::paginate($perPage);
    }

    public function findBySKU(string $sku): ?Product
    {
        return Product::where('sku', $sku)->firstOrFail();
    }
}
