<?php


use App\Http\Controllers\api\v1\CategoryController;

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

    Route::group(['prefix' => 'category', 'controller' => CategoryController::class], function () {

        Route::get('/', 'getCategories');
        Route::post('/new', 'newCategory');

    });


});
