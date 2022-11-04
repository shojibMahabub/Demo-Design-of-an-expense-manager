<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ExpenseController;
use App\Http\Controllers\Api\v1\ExpenseCategoryController;
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

Route::group(['prefix' => 'v1', 'middleware' => 'api', 'namespace' => 'Api\v1'], function () {
    Route::get('expense', [ExpenseController::class, 'index']);
    Route::post('expense', [ExpenseController::class, 'store']);
    Route::get('expense/{id}', [ExpenseController::class, 'show']);
    Route::delete('expense/{id}', [ExpenseController::class, 'destroy']);

    Route::get('expense-category', [ExpenseCategoryController::class, 'index']);
    Route::post('expense-category', [ExpenseCategoryController::class, 'store']);
    Route::get('expense-category/{id}', [ExpenseCategoryController::class, 'show']);
    Route::delete('expense-category/{id}', [ExpenseCategoryController::class, 'destroy']);
});