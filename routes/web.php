<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\service\ServicesController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'getMenu'])->name('home.menu');


Route::get('/abc', function () {
    return view('home.pages.sign-in');
})->name('abc');

Route::get('/ab', function () {
    return view('home.pages.sign-up');
})->name('ab');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => '/account/admin', 'middleware' => ['role:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
        
        Route::group(['prefix' => '/staff'], function () {
            Route::get('/add-view', [StaffController::class, 'index'])->name('staff.view');
            Route::post('/store', [StaffController::class, 'store'])->name('staff.store');
            Route::get('/list-view', [StaffController::class, 'getAll'])->name('staff.list-view');
            Route::get('/edit-view/{id}', [StaffController::class, 'getEditPage'])->name('staff.edit-view');
            Route::post('/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
            Route::delete('/delete/{id}', [StaffController::class, 'delete'])->name('staff.delete');
        });

        Route::group(['prefix' => '/service'], function () {
            Route::get('/add-view', [ServicesController::class, 'index'])->name('service.view');
            Route::post('/store', [ServicesController::class, 'store'])->name('service.store');
            Route::get('/list-view', [ServicesController::class, 'getAll'])->name('service.list-view');
            Route::get('/edit-view/{id}', [ServicesController::class, 'getEditPage'])->name('service.edit-view');
            Route::post('/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
            Route::delete('/delete/{id}', [ServicesController::class, 'delete'])->name('service.delete');
        });

        Route::group(['prefix' => '/product'], function () {
            Route::get('/add-view', [ProductController::class, 'index'])->name('product.view');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/list-view', [ProductController::class, 'getAll'])->name('product.list-view');
            Route::get('/edit-view/{id}', [ProductController::class, 'getEditPage'])->name('product.edit-view');
            Route::post('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });

        
        Route::group(['prefix' => '/restaurant'], function () {
            Route::get('/add-view', [RestaurantController::class, 'index'])->name('restaurant.view');
            Route::post('/store', [RestaurantController::class, 'store'])->name('restaurant.store');
            Route::get('/list-view', [RestaurantController::class, 'getAll'])->name('restaurant.list-view');
            Route::get('/edit-view/{id}', [RestaurantController::class, 'getEditPage'])->name('restaurant.edit-view');
            Route::post('/edit/{id}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
            Route::delete('/delete/{id}', [RestaurantController::class, 'delete'])->name('restaurant.delete');
        });
    });

    Route::group(['prefix' => '/account/home', 'middleware' => ['role:customer']], function () {
        Route::get('/add-to-cart', [HomeController::class, 'addToCart'])->name('home.add-to-cart');
        Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
