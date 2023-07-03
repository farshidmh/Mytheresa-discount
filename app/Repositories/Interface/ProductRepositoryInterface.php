<?php

namespace App\Repositories\Interface;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{

    public function find(int $id): ?Product;

    public function findBySKU(string $sku): ?Product;

    public function create(array $data): Product;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

}
