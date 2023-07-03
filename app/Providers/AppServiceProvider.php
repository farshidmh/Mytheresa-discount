<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\DiscountRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\DiscountRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->bind(DiscountRepositoryInterface::class, DiscountRepository::class);

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
