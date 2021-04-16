<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('contractors')->group(function () {
    Route::get('get-duplicated', [ContractorController::class, 'getDuplicated']);
});

Route::prefix('orders')->group(function () {
    Route::get('get-paid', [OrderController::class, 'getPaid']);
    Route::get('get-by-contractor-id/{contractor_id}', [OrderController::class, 'getByContractorId']);
    Route::get('get-total-sum-by-contractors', [OrderController::class, 'getTotalSumByContractors']);
});

Route::prefix('reflection')->get('/get-name', function () {
    return (new \ReflectionClass(Request::class))->getName();
});
