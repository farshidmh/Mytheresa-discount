<?php


use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\DiscountController;

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
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

    Route::group(['prefix' => 'discounts', 'controller' => DiscountController::class], function () {
        Route::get('/', 'index');
        Route::group(['prefix' => 'new'], function () {
            Route::post('/sku', 'storeByProduct');
            Route::post('/category', 'storeByCategory');
        });
    });


});
