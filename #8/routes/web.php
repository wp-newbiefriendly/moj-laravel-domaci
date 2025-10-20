<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::view('/about', 'about');
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

// Admin pages:
// Kontakt
Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts'])
->name('admin.allcontacts');
Route::post("send-contact", [\App\Http\Controllers\ContactController::class, 'sendContact']);


// Delete/undo/edit kontakte
Route::get('/admin/delete/contact/{contact}', [\App\Http\Controllers\ContactController::class, 'deleteContact'])
->name('obrisiKontakt');
Route::get('/admin/undo-contact/{id}', [\App\Http\Controllers\ContactController::class, 'undoDelete']);
Route::get('/admin/contact/{id}/edit', [\App\Http\Controllers\ContactController::class, 'editContact']);
Route::put('/admin/contact/{id}', [\App\Http\Controllers\ContactController::class, 'updateContact']);

// Proizvodi
Route::get('/admin/all-products', [\App\Http\Controllers\ProductsController::class, 'showAllProducts'])
    ->name('sviProizvodi');

// Add proizvode
Route::get('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'showAddProductForm']);
Route::post('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'storeProduct']);

// Delete/edit proizvodi
Route::get('/admin/products/{id}/edit', [\App\Http\Controllers\ShopController::class, 'editProduct']);
Route::put('/admin/products/{id}', [\App\Http\Controllers\ShopController::class, 'updateProduct']);
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, 'deleteProduct'])
    ->name('obrisiProizvod');
