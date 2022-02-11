<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController;


Route::get('Admin/login', [LoginController::class, 'index']);
Route::post('/Admin/login/store', [LoginController::class, 'store'])->name('Admin.login');
Route::get('/Admin/Home', function () {
    return view('Admin.Home');
})->name('Admin.Home');

Route::prefix('Admin')->group(function () {

    Route::prefix('product_types')->group(function () {
        Route::get('/create', [ProductTypeController::class, 'create'])->name('product_types.create');
        Route::post('/store', [ProductTypeController::class, 'store'])->name('product_types.store');
        Route::get('/index', [ProductTypeController::class, 'index'])->name('product_types.index');
        Route::get('/edit/{id}', [ProductTypeController::class, 'edit'])->name('product_types.edit');
        Route::post('/update/{id}', [ProductTypeController::class, 'update'])->name('product_types.update');
        Route::get('/delete/{id}', [ProductTypeController::class, 'delete'])->name('product_types.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/index', [ProductController::class, 'index'])->name('products.index');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    });
});
