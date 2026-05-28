<?php

use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/my-reservation', [ReservationController::class, 'getMyReservation'])->name('myReservation');
Route::post('/getMyreservation', [ReservationController::class, 'checkReservation'])->name('getMyReservation');
Route::post('/cancelMyReservation',[ReservationController::class, 'cancelReservation'])->name('cancelReservation');

Route::get('/reservation/reset', [ReservationController::class, 'clearReservation'])
    ->name('reservation.reset');

Route::get('/reservation', [ReservationController::class, 'step1'])->name('reservation_step1');
Route::post('/reservation', [ReservationController::class, 'step1_store'])->name('reservation_step1_store');

Route::get('/reservation/seat', [ReservationController::class, 'step2'])->name('reservation_step2');
Route::post('/reservation/seat', [ReservationController::class, 'step2_store'])->name('reservation_step2_store');

Route::get('/reservation/menu', [ReservationController::class, 'step3'])->name('reservation_step3');
Route::post('/reservation/menu', [ReservationController::class, 'step3_store'])->name('reservation_step3_store');

Route::get('/reservation/confirm', [ReservationController::class, 'step4'])->name('reservation_step4');
Route::post('/reservation/confirm', [ReservationController::class, 'step4_store'])->name('reservation_step4_store');