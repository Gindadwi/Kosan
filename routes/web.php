<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');

Route::get('/kos/{slug}', [BoardingHouseController::class, 'show'])->name('kos.show');
Route::get('/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos.rooms');
Route::get('/kos/booking{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking{slug}/information/save', [BookingController::class, 'information'])->name('booking.information.save');
Route::get('/kos/booking{slug}', [BookingController::class, 'booking'])->name('booking');



Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
Route::get('/find-result', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
