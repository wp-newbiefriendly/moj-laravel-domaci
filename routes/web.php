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
        Route::get('/all', 'getAllContacts')->name('contacts.all');
        Route::get('/send-contact', 'sendContact')->name('contacts.send');
        Route::get('/delete/{contact}', 'deleteContact')->name('contacts.delete');
        Route::get('/trashed', 'showTrashedContacts')->name('contacts.trashed');;
        Route::get('/undo/{id}', 'undoDelete')->name('contacts.undo');
        Route::get('/edit/{contact}', 'editContact')->name('contacts.edit');
        Route::put('/update/{contact}', 'updateContact')->name('contacts.update');
    });
    // Proizvodi:
    Route::controller(ProductsController::class)->prefix('/product')->group(function () {
        Route::get('/all', 'showAllProducts')->name('products.all');
        Route::get('/add', 'showAddProductForm')->name('products.add');
        Route::post('/add-products', 'storeProduct')->name('products.store');
        Route::get('/edit/{product}', 'editProduct')->name('products.edit');
        Route::put('/update/{product}', 'updateProduct')->name('products.update');
        Route::get('/delete/{product}', 'deleteProduct')->name('products.delete');
        Route::get('/undo/{id}', 'undoDelete')->name('products.undo');
    });
});

require __DIR__.'/auth.php';
