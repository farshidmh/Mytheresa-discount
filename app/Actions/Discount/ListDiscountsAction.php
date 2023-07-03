<?php

namespace App\Actions\Discount;


use App\Repositories\DiscountRepository;
use App\Repositories\Interface\DiscountRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ListDiscountsAction
 *
 * An action that handles the retrieval of all discounts.
 *
 * @package App\Actions\Discount
 * @version 1.0.0
 */
class ListDiscountsAction
{
    private DiscountRepository $discountRepository;

    public function __construct(DiscountRepositoryInterface $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    /**
     * Executes the action and returns all the discounts.
     *
     * @return Collection A collection of all the discounts.
     * @version 1.0.0
     */
    public function execute(): Collection
    {
        return $this->discountRepository->all();
    }
}
