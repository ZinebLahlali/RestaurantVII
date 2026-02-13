<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\restauController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;

// Route::get('/', function () {
//     return view('home');
// });

 
// Route::get('/restaurant',[restauController::class,'showAllRestaurant'])->name('home');

Route::get('/dashboardR', [UserController::class, 'dashboard'])->name('dashboardR');
Route::get('/AjouterR', [restauController::class, 'ShowFormResaurateur']);
Route::post('/add_restaurant', [restauController::class, 'store'])->name('restau.add');
Route::get('/edit', [restauController::class, 'ShowFormEdit'])->name('edit');
 Route::get('/restaurateur/{id}/edit', [restauController::class, 'edit'])->name('edit');
 Route::put('/restaurateur/{id}', [restauController::class, 'update'])->name('edit');

// Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/home', [restauController::class, 'search'])
// ->name('home');
Route::redirect('/', '/restaurant');
Route::get('/restaurant', [restauController::class, 'index'])->name('home');


Route::middleware('auth')->group(function(){
    Route::post('/home/{restaurant}/favorite', [restauController::class, 'favoriteRestau'])->name('restaurant.favorite');
    Route::delete('/home/{restaurant}/favorite', [restauController::class, 'unfavoriteRestau'])->name('restaurant.unfavorite');
});

Route::get('/viewFavorites', [restauController::class, 'listFavorites'])
->middleware('auth')
->name('viewFavorites');

Route::get('/add_restaurant', [restauController::class, 'create'])->name('addRestaurant');
Route::get('/reservation/{id}', [ReservationController::class, 'showReserveForm'])->name('reservation');
Route::post('/add_reservation', [ReservationController::class, 'store'])->name('reservation.add');

Route::get('/create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');


Route::get('paypal/pay', [App\Http\Controllers\PayPalController::class, 'createPayment'])->name('paypal.pay');
Route::get('paypal/success', [App\Http\Controllers\PayPalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel', [App\Http\Controllers\PayPalController::class, 'cancel'])->name('paypal.cancel');


