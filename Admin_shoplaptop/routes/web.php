<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\InvoiceDeitailController;


Route::prefix('Admin')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('Admin.login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('Admin')->group(function () {
        Route::get('/Home', function () {
            return redirect()->view('Admin.Home');
        })->name('Admin.Home');
        Route::group(['prefix' => 'products'], function () {
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/store', [ProductController::class, 'store'])->name('products.store');
            Route::get('/index', [ProductController::class, 'index'])->name('products.index');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
        });
        Route::prefix('product_types')->group(function () {
            Route::get('/create', [ProductTypeController::class, 'create'])->name('product_types.create');
            Route::post('/store', [ProductTypeController::class, 'store'])->name('product_types.store');
            Route::get('/index', [ProductTypeController::class, 'index'])->name('product_types.index');
            Route::get('/edit/{id}', [ProductTypeController::class, 'edit'])->name('product_types.edit');
            Route::post('/update/{id}', [ProductTypeController::class, 'update'])->name('product_types.update');
            Route::get('/delete/{id}', [ProductTypeController::class, 'delete'])->name('product_types.delete');
        });

        Route::prefix('users')->group(function () {
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/index', [UserController::class, 'index'])->name('users.index');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        });

        Route::prefix('invoices')->group(function () {
            Route::get('/index_detail/{id}', [InvoicesController::class, 'see_deltail'])->name('invoices.detail');
            Route::get('/index', [InvoicesController::class, 'index'])->name('invoices.index');
            Route::get('/edit/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');
            Route::post('/update/{id}', [InvoicesController::class, 'update'])->name('invoices.update');
            Route::get('/delete/{id}', [InvoicesController::class, 'delete'])->name('invoices.delete');
        });
    });
});
