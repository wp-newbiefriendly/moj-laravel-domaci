<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::view('/about', 'about');
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts'])
->name('admin.allcontacts');
Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactController::class, 'deleteContact']);
Route::get('/admin/undo-contact/{id}', [\App\Http\Controllers\ContactController::class, 'undoDelete']);

Route::get('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'showAddProductForm']);
Route::post('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'storeProduct']);
Route::get('/admin/products/{id}/edit', [\App\Http\Controllers\ShopController::class, 'editProduct']);
Route::put('/admin/products/{id}', [\App\Http\Controllers\ShopController::class, 'updateProduct']);
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, 'deleteProduct']);


Route::get('/admin/all-products', [\App\Http\Controllers\ProductsController::class, 'showAllProducts']);

Route::post("send-contact", [\App\Http\Controllers\ContactController::class, 'sendContact']);
//Route::view(uri:"/contact", view:"contact");
