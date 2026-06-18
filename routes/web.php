<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Ambil produk yang stoknya masih ada (lebih dari 0)
    $products = Product::where('stok', '>', 0)->latest()->get();
    
    // Kirim data produk ke halaman dashboard
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route CRUD Produk menggunakan resource agar otomatis membuat route index, create, store, edit, update, destroy
    Route::resource('products', ProductController::class);

    Route::get('/checkout/{product_id}', [TransactionController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/store/{product_id}', [TransactionController::class, 'storeTransaction'])->name('checkout.store');
    Route::get('/orders/history', [TransactionController::class, 'history'])->name('orders.history');
});

require __DIR__.'/auth.php';
