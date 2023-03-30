<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\AuctionController;
use App\Http\Controllers\api\AuctioneerController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\InvoiceController;
use App\Http\Controllers\api\KurirController;
use App\Http\Controllers\api\OfferController;
use App\Http\Controllers\api\OngkirController;
use App\Http\Controllers\api\PengirimanController;
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
    Route::put('/user/{user}', [UserController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/my-invoice', [InvoiceController::class, 'userInvoice']);

// Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {
// });

Route::apiResource('offer', OfferController::class);
Route::apiResource('admin', AdminController::class);
Route::get('/users', [UserController::class, 'users']);
Route::get('/customers', [UserController::class, 'customers']);
Route::get('/customer/{user}', [UserController::class, 'customer']);
Route::delete('/user/{id}', [UserController::class, 'remove']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login-admin', [AuthController::class, 'loginAdmin']);
Route::apiResource('auction', AuctionController::class)->parameters(['auction' => 'auction:token']);
Route::apiResource('auctioneer', AuctioneerController::class);
Route::apiResource('product', ProductController::class)->parameters(['product' => 'product:product_slug']);
Route::get('/auction-gallery', [AuctionController::class, 'paginateAction']);
Route::apiResource('category', CategoryController::class)->except('update');
Route::apiResource('invoice', InvoiceController::class)->parameters(['invoice' => 'invoice:kode_pembayaran']);
Route::apiResource('kurir', KurirController::class);
Route::get('kurirs', [KurirController::class, 'dataKurir']);
Route::apiResource('pengiriman', PengirimanController::class);
Route::apiResource('ongkir', OngkirController::class);

Route::get('/city', [OngkirController::class, 'selectCityByProvince']);
Route::get('/cost', [OngkirController::class, 'retrieveCostByCourier']);
