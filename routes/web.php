<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/apartments', [ApartmentController::class, 'show'])->name('apartments');
Route::get('/import-apartments', [ApartmentController::class, 'showImport']);
Route::get('/add-apartments', [ApartmentController::class, 'showInputs']);
Route::post('/parse-apartments', [ApartmentController::class, 'importApartments']);
Route::post('/store-apartments', [ApartmentController::class, 'storeApartments']);
Route::get('/delete-apartment/{apartment}', [ApartmentController::class, 'deleteApartment']);
Route::get('/reservations', [ApartmentController::class, 'showReservations']);
Route::get('/cancel-reservation/{apartment}', [ApartmentController::class, 'cancelReservation']);

Route::get('order/{apartment}', [ReservationController::class, 'showForm']);
Route::post('/apartments/{apartment}/reserve', [ReservationController::class, 'reserveApartment']);

Route::get('/', [HomeController::class, 'showHome']);