<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

    Route::delete('/product/{product}',[ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');

    //membuat kelola list account
    Route::get('/account', [ProfileController::class, 'index'])->name('account.index');

    Route::get('/account/create', [ProfileController::class, 'create'])->name('account.create');
    Route::post('account', [ProfileController::class, 'store'])->name('account.store');

    Route::get('account/{user}/edit', [ProfileController::class, 'accountEdit'])->name('account.edit');
    Route::put('account/{user}', [ProfileController::class, 'accountUpdate'])->name('account.update');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
