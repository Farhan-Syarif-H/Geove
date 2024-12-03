<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ExportController;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/remove-from-cart/{productId}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/checkout/single/{id}', [CartController::class, 'checkoutSingle'])->name('checkout.single');
    Route::post('/checkout/all', [CartController::class, 'checkoutAll'])->name('checkout.all');

    Route::get('/orders/{id}/receipt', [OrderController::class, 'downloadReceipt'])->name('orders.receipt');
    Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});


require __DIR__.'/auth.php';

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/account', [ProfileController::class, 'index'])->name('account.index');
    Route::get('/account/create', [ProfileController::class, 'create'])->name('account.create');
    Route::post('account', [ProfileController::class, 'store'])->name('account.store');

    Route::get('account/{user}/edit', [ProfileController::class, 'accountEdit'])->name('account.edit');
    Route::put('account/{user}', [ProfileController::class, 'accountUpdate'])->name('account.update');

    Route::delete('/account/delete/{id}', [ProfileController::class, 'accountDelete'])->name('account.delete');

    Route::get('/export-users', [ExportController::class, 'exportUsers'])->name('users.export.excel');


    Route::get('/list-orders', [OrderController::class, 'index'])->name('orders.index');


});

