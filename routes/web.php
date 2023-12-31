<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('category',CategoryController::class);
    Route::get('/category-status{id}',[CategoryController::class,'status'])->name('category-status');

    Route::resource('brand',BrandController::class);
    Route::get('/brand-status{id}',[BrandController::class,'status'])->name('brand-status');

    Route::resource('product',ProductController::class);
    Route::get('/products/get-sub-category/{cat_id}', [ProductController::class, 'getSubCategory']);
    Route::get('/product-status{id}',[ProductController::class,'status'])->name('product-status');
});
