<?php

use App\Http\Controllers\Admin\AdminReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminTourController;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [
        AuthController::class, 'index'
    ])->name('login');

    Route::post('login_process', [
        AuthController::class, 'login'
    ])->name('login_process');

});

Route::middleware('auth:admin')->group(function () {

    Route::get('tour_list', [
        AdminTourController::class, 'index'
    ])->name('tour.list');

    Route::get('tour_create', [
        AdminTourController::class, 'create'
    ])->name('tour.create');

    Route::get('tour_edit', [
        AdminTourController::class, 'edit'
    ])->name('tour.edit');

    Route::get('tour_delete', [
        AdminTourController::class, 'destroy'
    ])->name('tour.delete');

    Route::get('tour_removeFromBest', [
        AdminTourController::class, 'removeFromBest'
    ])->name('tour.removeFromBest');

    Route::get('tour_addToBest', [
        AdminTourController::class, 'addToBest'
    ])->name('tour.addToBest');

    Route::get('reviews', [
        AdminReviewController::class, 'reviewsIndex'
    ])->name('reviews');

    Route::get('reviews_status', [
        AdminReviewController::class, 'reviewsStatus'
    ])->name('reviews.status');

    Route::post('tour_created', [
        AdminTourController::class, 'store'
    ])->name('tour.created');

    Route::post('tour_update', [
        AdminTourController::class, 'update'
    ])->name('tour.update');

    Route::get('logout', [
        AuthController::class, 'logout'
    ])->name('logout');
});
