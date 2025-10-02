<?php
use App\Http\Controllers\BidController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WinnerController;
use Illuminate\Support\Facades\Route;

// User routes

// Root redirect to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'], function () {

        return view('dashboard');
    })->name('dashboard');

    Route::get('/user_bidding_product', [ProductController::class, 'userProducts'])
        ->name('user.products');

    Route::get('/user_about', function () {
        return view('user_about');
    });

    Route::get('/user_contact', function () {
        return view('user_contact');
    });

    Route::get('/master', function () {
        return view('layout.master');
    });
});

// Bidding
Route::post('/bids', [BidController::class, 'store'])
    ->middleware(['auth'])
    ->name('bids.store');
Route::get('/winner/{id}', [BidController::class, 'winner'])->name('bids.winner');

// Payment
Route::get('/payment/{productId}', function ($productId) {
    return redirect('https://www.bkash.com/');
});

// Winner
Route::post('/winners', [WinnerController::class, 'store'])->name('winners.store');
Route::get('/admin/winners', [WinnerController::class, 'index'])->name('admin.admin_winners');
Route::post('/admin/winners/{id}/paid', [WinnerController::class, 'markPaid'])->name('winners.paid');
Route::post('/declare-winner/{productId}', [WinnerController::class, 'declareAndSave']);

// Search
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [ProductController::class, 'index'])->name('admin.admin_dashboard');
    Route::get('/admin-product', [ProductController::class, 'create'])->name('admin.admin_add_products');
    Route::post('/admin-add-products', [ProductController::class, 'store'])->name('admin.store_product');
    Route::get('/admin/products', [ProductController::class, 'productsList'])->name('admin.products.list');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/products/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('admin/registerlist', [ProductController::class, 'registerList'])
        ->name('admin.registerlist');
    Route::get('/admin/search', [App\Http\Controllers\Admin\ProductController::class, 'adminsearch'])->name('admin.search');

});

// Profile (Breeze default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze authentication routes (login, register, etc.)
require __DIR__ . '/auth.php';
