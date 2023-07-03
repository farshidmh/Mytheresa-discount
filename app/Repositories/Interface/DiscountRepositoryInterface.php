<?php

namespace App\Repositories\Interface;

use App\Models\Discount;
use Illuminate\Support\Collection;

interface DiscountRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Discount;
}
