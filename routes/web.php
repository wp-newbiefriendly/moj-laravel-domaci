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
// Kontakt
    Route::get('/all-contacts', [ContactController::class, 'getAllContacts'])
        ->name('admin.allcontacts');
    Route::post("/send-contact", [ContactController::class, 'sendContact']);


// Delete/undo/edit kontakte
    Route::get('/delete/contact/{contact}', [ContactController::class, 'deleteContact'])
        ->name('contact.delete');
    Route::get('/trashed-contacts', [ContactController::class, 'showTrashedContacts'])
        ->name('trashedContacts');

    Route::get('/undo-contact/{id}', [ContactController::class, 'undoDelete'])
        ->name('contact.undo');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'editContact'])
        ->name('contact.edit');
    Route::put('/contact/{contact}', [ContactController::class, 'updateContact'])
        ->name('updateContact');

// Proizvodi:
    Route::get('/all-products', [ProductsController::class, 'showAllProducts'])
        ->name('admin.allproducts');

// Add proizvode:
    Route::get('/add-products', [ShopController::class, 'showAddProductForm'])
        ->name('admin.addproduct');

    Route::post('/add-products', [ShopController::class, 'storeProduct']);

// Delete/edit proizvodi:
    Route::get('/products/edit/{product}', [ShopController::class, 'editProduct'])
        ->name('products.edit');
    Route::put('/products/update/{product}', [ShopController::class, 'updateProduct'])
        ->name('products.update');

    Route::get('/delete-product/{product}', [ProductsController::class, 'deleteProduct'])
        ->name('products.delete');
    Route::get('/undo-product/{id}', [ShopController::class, 'undoDelete']);

});

require __DIR__.'/auth.php';
