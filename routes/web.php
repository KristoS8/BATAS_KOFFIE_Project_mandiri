<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/reservation', [ReservationController::class, 'step1'])->name('reservation_step1');
Route::post('/reservation', [ReservationController::class, 'step1_store'])->name('reservation_step1_store');

Route::get('/reservation/seat', [ReservationController::class, 'step2'])->name('reservation_step2');
Route::post('/reservation/seat', [ReservationController::class, 'step2_store']);