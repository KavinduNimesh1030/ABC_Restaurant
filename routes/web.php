<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\service\ServicesController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
