<?php


use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\DiscountController;

use App\Http\Controllers\api\v1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'categories', 'controller' => CategoryController::class], function () {
        Route::get('/', 'index')->name('categories.index');
        Route::post('/', 'store')->name('categories.store');
    });

    Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {
        Route::get('/category/{categoryName}', 'getProductsByCategoryName')->name('products.getProductsByCategoryName');
        Route::get('/priceLessThan/{price}', 'getProductsByPrice')->name('products.priceLessThan');
        Route::get('/', 'getAllProducts')->name('products.getAllProducts');
        Route::post('/', 'store')->name('products.store');
    });

    Route::group(['prefix' => 'discounts', 'controller' => DiscountController::class], function () {
        Route::get('/', 'index')->name('discounts.index');
        Route::group(['prefix' => 'new'], function () {
            Route::post('/sku', 'storeByProduct')->name('discounts.storeByProduct');
            Route::post('/category', 'storeByCategory')->name('discounts.storeByCategory');
        });
    });


});
