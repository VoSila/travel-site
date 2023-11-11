<?php

use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Tour\PaymentController;
use App\Http\Controllers\Tour\ReviewController;
use App\Http\Controllers\Tour\TourController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    TourController::class, 'allData'
])->name('index');

Route::get('/tours', [
    TourController::class, 'tours'
])->name('tours');

Route::get('/sort', [
    TourController::class, 'sort'
])->name('sort');

Route::post('/charge', [
    PaymentController::class, 'charge'
])->name('charge');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        UserController::class, 'profile'
    ])->name('profile');

    Route::get('/cancel_booking', [
        UserController::class, 'cancelBookings'
    ])->name('cancel.booking');

    Route::post('/edit_profile', [
        UserController::class, 'editProfile'
    ])->name('edit.profile');

    Route::post('/checking_reviews', [
        ReviewController::class, 'create'
    ])->name('checking.reviews');

    Route::post('/booking', [
        TourController::class, 'booking'
    ])->name('booking');

});

require __DIR__ . '/auth.php';
