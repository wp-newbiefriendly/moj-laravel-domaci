<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminCheckMiddleware;

Route::get('/', [HomeController::class, 'index']);
Route::view('/about', 'about');
Route::view('/test', 'test');
Route::get('/shop', [ShopController::class, 'index']);
Route::get('products/{product}', [ProductsController::class, 'permalink'])->name('products.permalink');
Route::post("cart/add", [ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::get("/cart", [ShoppingCartController::class, 'index'])->name('cart.index');

Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
// Admin pages:
// Kontakti:
    Route::controller(ContactController::class)->prefix('/contact')->name('contacts.')->group(function () {
        Route::get('/all', 'getAllContacts')->name('all');
        Route::get('/send-contact', 'sendContact')->name('send');
        Route::get('/delete/{contact}', 'deleteContact')->name('delete');
        Route::get('/trashed', 'showTrashedContacts')->name('trashed');;
        Route::get('/undo/{id}', 'undoDelete')->name('undo');
        Route::get('/edit/{contact}', 'editContact')->name('edit');
        Route::put('/update/{contact}', 'updateContact')->name('update');
      });
    // Proizvodi:
    Route::controller(ProductsController::class)->prefix('/product')->name('products.')->group(function () {
        Route::get('/all', 'showAllProducts')->name('all');
        Route::get('/add', 'showAddProductForm')->name('add');
        Route::post('/add-products', 'storeProduct')->name('store');
        Route::get('/edit/{product}', 'editProduct')->name('edit');
        Route::put('/update/{product}', 'updateProduct')->name('update');
        Route::get('/delete/{product}', 'deleteProduct')->name('delete');
        Route::get('/undo/{id}', 'undoDelete')->name('products.undo');
    });
});

require __DIR__.'/auth.php';
