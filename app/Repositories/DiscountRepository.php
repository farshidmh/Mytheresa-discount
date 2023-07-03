<?php

namespace App\Repositories;

use App\Models\Discount;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class DiscountRepository
 *
 * A repository that handles the crud operations of discounts.
 *
 * @package App\Repositories
 * @version 1.0.0
 */
class DiscountRepository implements Interface\DiscountRepositoryInterface
{

    /**
     * Retrieves all discounts.
     *
     * The result is cached for 60 minutes. If the cache exists, this method will return
     * the cached result. If the cache does not exist, this method will fetch all discounts
     * from the database, store the result in the cache, and then return the result.
     *
     * @return Collection A collection of Discount instances.
     */
    public function all(): Collection
    {
        return Cache::remember('discounts', 60, function () {
            return Discount::all();
        });
    }

    public function create(array $data): Discount
    {
        // Create the new discount.
        $discount = Discount::create($data);

        // Clear the discounts cache.
        Cache::forget('discounts');

        // Return the newly created discount.
        return $discount;
    }
}
