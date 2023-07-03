<?php


namespace App\Actions\Product;

use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\DiscountRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class FormatProductsResultAction
 * This action is responsible for formatting the product result with the
 * necessary information including discount and category name.
 *
 * @version 1.0.0
 */
class FormatProductsResultAction
{
    private DiscountRepositoryInterface $discountRepository;
    private CategoryRepositoryInterface $categoryRepository;


    public function __construct(
        DiscountRepositoryInterface $discountRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->discountRepository = $discountRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Executes the action and returns the formatted products.
     *
     * @param LengthAwarePaginator $products
     * @return LengthAwarePaginator
     */
    public function execute(LengthAwarePaginator $products): LengthAwarePaginator
    {
        $discounts = $this->discountRepository->all();
        $categories = $this->categoryRepository->all();

        $products->getCollection()->transform(function ($product) use ($discounts, $categories) {
            $product->category = $categories->where('id', $product->category_id)->first()->name;

            $productDiscounts = $discounts->where('product_id', $product->id)->max('percentage');
            $categoryDiscounts = $discounts->where('category_id', $product->category_id)->max('percentage');

            // Get the highest discount
            $highestDiscount = max($productDiscounts, $categoryDiscounts);

            // Structure the price information
            $product->price = [
                'original' => $product->price,
                'final' => (!is_null($highestDiscount)) ? round($product->price - ($product->price * ($highestDiscount / 100))) : $product->price,
                'discount_percentage' => $highestDiscount ? $highestDiscount . '%' : null,
                'currency' => 'EUR'
            ];

            return $product;
        });

        return $products;
    }
}
