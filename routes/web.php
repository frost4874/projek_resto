<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarBookingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/daftar_booking', [DaftarBookingController::class, 'filterByDate'])->name('filterByDate');
Route::get('/daftar_booking', [DaftarBookingController::class, 'show'])->name('daftar_booking')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Menampilkan form registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Mengirim data form registrasi
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


Route::get('/login', function () {
    return view('login');
})->name('login');

// Tambahkan route POST untuk proses login
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


