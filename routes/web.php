<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateProduct;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class,'ShowAllProducts'])->name('products.all');
Route::get('/categories',[CategoryController::class, 'ShowAllCategories'])->name('categories.all');
Route::get('/create-product', [CreateProduct::class,'CreateProduct'])->name('products.create');
Route::post('store-product', [CreateProduct::class, 'store'])->name('product.store');
Route::get('/product/{id}',[ProductController::class, 'ShowProductDetails'])->name('prducts.details');
Route::get('/edit-product/{id}',[ProductController::class,'EditProduct'])->name('products.edit');
Route::post('/update-product/{id}',[ProductController::class, 'UpdateProduct'])->name('products.update');
Route::delete('/delete-product/{id}', [ProductController::class, 'DeleteProduct'])->name('products.delete');