<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuctionController;
use App\Http\Controllers\api\AuctioneerController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\DocumentController;
use App\Http\Controllers\api\OfferController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\UserController;
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

Route::group(['middleware' => ['auth:sanctum', 'role:customer']], function () {
    Route::get('/user', [UserController::class, 'user']);
    Route::post('/user/update', [UserController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('offer', OfferController::class);
});

Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
    Route::apiResource('admin', AdminController::class)->except('store');
});

Route::apiResource('admin', AdminController::class)->only('store');
Route::get('/users', [UserController::class, 'users']);
Route::get('/customers', [UserController::class, 'customers']);
Route::get('/customer/{user}', [UserController::class, 'customer']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('auction', AuctionController::class);
Route::apiResource('auctioneer', AuctioneerController::class);
Route::apiResource('product', ProductController::class)->parameters(['product' => 'product:product_slug']);
Route::get('/product-gallery', [ProductController::class, 'productPaginate8']);
Route::apiResource('category', CategoryController::class)->except('update');
Route::apiResource('document', DocumentController::class);
Route::apiResource('payment', PaymentController::class);
