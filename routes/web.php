<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminCheckMiddleware;

Route::get('/', [HomeController::class, 'index']);
Route::view('/about', 'about');
Route::view('/test', 'test');
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
// Admin pages:
// Delete/undo/edit kontakte
    Route::controller(ContactController::class)->prefix('/contact')->group(function () {
        Route::get('/all-contacts', 'getAllContacts')->name('admin.allcontacts');
        Route::get('/send-contact', 'sendContact')->name('sendContact');
        Route::get('/delete-contact/{contact}', 'deleteContact')->name('contact.delete');
        Route::get('/trashed-contacts', 'showTrashedContacts')->name('trashedContacts');
        Route::get('/undo-contact/{id}', 'undoDelete')->name('contact.undo');
        Route::get('/{contact}/edit', 'editContact')->name('contact.edit');
        Route::put('/{contact}', 'updateContact')->name('updateContact');
    })
// Proizvodi:
    Route::controller(ProductsController::class)->group(function () {
        Route::get('/all-products', 'showAllProducts')->name('products.all');
        Route::get('/add-products', 'showAddProductForm')->name('products.add');
        Route::post('/add-products', 'storeProduct');
        Route::get('/products/edit/{product}', 'editProduct')->name('products.edit');
        Route::put('/products/update/{product}', 'updateProduct')->name('products.update');
        Route::get('/delete-product/{product}', 'deleteProduct')->name('products.delete');
        Route::get('/undo-product/{id}', 'undoDelete');
    })
});

require __DIR__.'/auth.php';
