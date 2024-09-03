<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\service\ServicesController;
use App\Http\Controllers\Staff\StaffController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'getMenu'])->name('home.menu');
Route::post('/reservation-store', [HomeController::class, 'storeReservation'])->name('home.reservation.store');


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

        Route::group(['prefix' => '/reservation'], function () {
            Route::get('/list-view', [ReservationController::class, 'getReservation'])->name('reservation.list-view');
            Route::post('/change-status/{id}', [ReservationController::class, 'changeStatus'])->name('reservation.change-status');
        });

        Route::group(['prefix' => '/order'], function () {
            Route::get('/list-view', [OrderController::class, 'getReservation'])->name('order.list-view');
            Route::post('/change-status/{id}', [OrderController::class, 'changeStatus'])->name('order.change-status');
        });
    });

    Route::group(['prefix' => '/account/home', 'middleware' => ['role:customer']], function () {
        Route::post('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('home.add-to-cart');
        Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
        Route::post('/remove-from-cart/{id}', [HomeController::class, 'removeFromCart'])->name('home.remove-from-cart');
        Route::get('/checkout-page', [HomeController::class, 'loadCheckoutPage'])->name('home.checkout-page');
        Route::post('/checkout', [HomeController::class, 'checkout'])->name('home.checkout');
        Route::get('/reservation-views', [HomeController::class, 'loadReservationPage'])->name('home.reservation.view');

    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
