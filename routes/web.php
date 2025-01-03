<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingControler;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/find-kos', [BoardingHouseController::class,'find'])->name('find-kos');
Route::get('/find-result', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');
Route::get('/check-booking', [BookingControler::class, 'check'])->name('check-booking');