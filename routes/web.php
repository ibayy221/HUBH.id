<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LicenseController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PlaceholderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products/{product:slug}', [ProductPageController::class, 'show'])->name('products.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class)->names('products');
        Route::resource('products.packages', PackageController::class)->names('products.packages')->parameters([
            'products' => 'product',
        ]);
        Route::resource('clients', ClientController::class)->names('clients');
        Route::resource('licenses', LicenseController::class)->names('licenses');
        Route::post('licenses/{license}/toggle-status', [LicenseController::class, 'toggleStatus'])->name('licenses.toggle-status');
        Route::post('clients/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('clients.toggle-status');
        Route::get('{section}', [PlaceholderController::class, 'index'])->where('section', 'produk|client|keuangan|lead|support|pengaturan')->name('placeholder');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::middleware('guest:customer')->group(function () {
        Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [CustomerAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware([CustomerMiddleware::class])->group(function () {
        Route::get('/', function () {
            return view('customer.dashboard');
        })->name('home');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('logout');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
