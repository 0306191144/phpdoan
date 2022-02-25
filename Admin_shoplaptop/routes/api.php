<?php

use App\Http\Controllers\Api_user\AuthController;
use App\Http\Controllers\Api_user\CartController;
use App\Http\Controllers\Api_user\InvoiceController;
use App\Http\Controllers\Api_user\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/invoice/create', [InvoiceController::class, 'payment']);
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});


route::get('product/{product}', [ProductController::class, 'show'])->name('Product_show');
route::get('product/list', [ProductController::class, 'list_product']);
Route::post('/add/{id}', [CartController::class, 'addToCart']);
Route::get('/list', [CartController::class, 'getCartByUser']);
Route::post('/invoice/create', [InvoiceController::class, 'payment']);



Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::post('/add/{id}', [CartController::class, 'addToCart']);
        Route::get('/list', [CartController::class, 'getCartByUser']);
        Route::get('/update/{id}', [CartController::class, 'updateCart']);
        Route::post('/delete{id}', [CartController::class, 'removeCart']);
    });
    Route::prefix('invoice')->group(function () {
        Route::post('/status', [InvoiceController::class, 'processing']);

        Route::get('/delete/{id}', [CartController::class, 'delete']);
        Route::get('/update/shipping)', [CartController::class, 'remove_Cart']);
    });

    Route::prefix('product')->group(function () {
        Route::post('/category/{id}', [CartController::class, 'addToCart']);
        Route::get('/list_product', [CartController::class, 'getCartByUser']);
        Route::get('/update/{id}', [CartController::class, ' update_invoice']);
        Route::post('/delete/{id}', [CartController::class, 'remove_Cart']);
    });
    Route::prefix('user')->group(function () {
        Route::post('/update', [CartController::class, 'addToCart']);
        Route::get('/forgotpassword', [CartController::class, 'getCartByUser']);
    });
});
