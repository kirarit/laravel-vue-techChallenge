<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FleetsController;
use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\CustomerOrdersController;

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

Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        'customer-orders' => CustomerOrdersController::class,      
        'customers' => CustomersController::class,
        'fleets' => FleetsController::class,
    ]);
});
