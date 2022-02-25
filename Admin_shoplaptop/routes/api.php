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
Route::get('/get_list_invoice', [InvoiceController::class, 'get_list_invoice']);
Route::get('/get_status_invoice/{id}', [InvoiceController::class, 'get_status_invoice']);
Route::get('/invoices/delete/{id}', [InvoiceController::class, 'delete']);
Route::post('/update_status/{id}', [InvoiceController::class, 'update_status']);






Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::post('/add/{id}', [CartController::class, 'addToCart']);
        Route::get('/list', [CartController::class, 'getCartByUser']);
        Route::get('/update/{id}', [CartController::class, 'updateCart']);
        Route::post('/delete{id}', [CartController::class, 'removeCart']);
    });
    Route::prefix('invoice')->group(function () {
        Route::get('/get_list_invoice', [InvoiceController::class, 'get_list_invoice']);
        Route::get('/get_status_invoice/{id}', [InvoiceController::class, 'get_status_invoice']);
        Route::get('/delete/{id}', [InvoiceController::class, 'delete']);
        Route::get('/update/shipping)', [InvoiceControllerr::class, 'remove_Cart']);
        Route::post('/update_status/{id}', [InvoiceController::class, 'update_status']);
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
