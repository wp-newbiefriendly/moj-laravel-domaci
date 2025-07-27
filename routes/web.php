<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::view('/about', 'about');
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index']);
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin pages:
// Kontakt
Route::get('/admin/all-contacts', [\App\Http\Controllers\ContactController::class, 'getAllContacts'])
    ->name('admin.allcontacts');
Route::post("send-contact", [\App\Http\Controllers\ContactController::class, 'sendContact']);


// Delete/undo/edit kontakte
Route::get('/admin/delete/contact/{contact}', [\App\Http\Controllers\ContactController::class, 'deleteContact'])
    ->name('obrisiKontakt');
Route::get('/admin/trashed-contacts', [\App\Http\Controllers\ContactController::class, 'showTrashedContacts'])
    ->name('trashedContacts');

Route::get('/admin/undo-contact/{id}', [\App\Http\Controllers\ContactController::class, 'undoDelete'])
    ->name('contact.undo');
Route::get('/admin/contact/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'editContact'])
    ->name('editContact');
Route::put('/admin/contact/{contact}', [\App\Http\Controllers\ContactController::class, 'updateContact'])
    ->name('updateContact');

// Proizvodi
Route::get('/admin/all-products', [ProductsController::class, 'showAllProducts'])
    ->name('sviProizvodi');

// Add proizvode
Route::get('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'showAddProductForm']);
Route::post('/admin/add-products', [\App\Http\Controllers\ShopController::class, 'storeProduct']);

// Delete/edit proizvodi
Route::get('/admin/products/edit/{product}', [\App\Http\Controllers\ShopController::class, 'editProduct'])
    ->name('products.edit');
Route::put('/admin/products/update/{product}', [\App\Http\Controllers\ShopController::class, 'updateProduct'])
    ->name('products.update');

Route::get('/admin/delete-product/{product}', [ProductsController::class, 'deleteProduct'])
    ->name('obrisiProizvod');
Route::get('/admin/undo-product/{id}', [\App\Http\Controllers\ShopController::class, 'undoDelete']);


require __DIR__.'/auth.php';
