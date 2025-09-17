
<?php

    use App\Http\Controllers\ProductController;
    //use App\Http\Controllers\Admin\ProductController as AdminProductController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('user_dashboard');
    });
    Route::get('/user_dashboard', function () {
        return view('user_dashboard');
    });
    Route::get('/user_bidding_product', function () {
        return view('user_bidding_product');
    });
    Route::get('/user_about', function () {
        return view('user_about');
    });
    Route::get('/user_contact', function () {
        return view('user_contact');
    });
    Route::get('/master', function () {
        return view('layout.master');
    });

    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/register', function () {
        return view('auth.register');
    });

    // Admin Panel Routes
    // Route::prefix('admin')->group(function () {
    //     Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    //     Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    //     Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    // });
    // Route::get('/admin/dashboard', function () {
    //     return view('admin_dashboard');
    // })->name('admin.dashboard');

    // // Admin Products Page
    // Route::get('/admin/products', function () {
    //     return view('admin_products');
    // })->name('admin.products');

    // // Admin Winners Page
    // Route::get('/admin/winners', function () {
    //     return view('admin_winners');
    // })->name('admin.winners');

    // Admin All Data Page
    // Route::get('/admin/all-data', function () {
    //     return view('admin_all_data');
    // })->name('admin.all_data');

    // Show Add Product form
    //Route::get('/admin/add/products', [AdminProductController::class, 'create'])->name('admin.add_products');

    // Store Product
    //Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    //Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
    // Route::get('/admin/add/products', function () {
    //     return view('admin_master');
    // })->name('admin.add_products');

    // Product list dekhano
    //  Route::get('/admin/products', [addproductController ::class, 'index'])->name('admin_add_products');

    //     // Form submit kore database e save
    //     Route::post('/admin/products', [addproductController::class, 'store'])->name('aadmin_add_products.store');
    //     use Illuminate\Support\Facades\Route;

    // Route::post('/admin/products/store', [addproductController::class, 'store'])->name('admin_add_products.store');

    // Admin Dashboard
    Route::get('/admin/dashboard', [ProductController::class, 'index'])->name('admin.admin_dashboard');

Route::get('/admin-product', [ProductController::class, 'create'])->name('admin.admin_add_products');
Route::post('/admin-add-products', [ProductController::class, 'store'])->name('admin.store_product');