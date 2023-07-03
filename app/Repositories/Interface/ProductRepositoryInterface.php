<?php

namespace App\Repositories\Interface;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{

    public function findBySKU(string $sku): ?Product;

    public function create(array $data): Product;

    public function all(int $perPage = 5): LengthAwarePaginator;

    public function getProductsByCategoryName(string $categoryName, int $perPage = 5): LengthAwarePaginator;

    public function getProductsByPriceLessThan(int $price, int $perPage = 5): LengthAwarePaginator;

}
