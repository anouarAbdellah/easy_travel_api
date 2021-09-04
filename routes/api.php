<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ticket/{id}', [ReservationController::class, 'ticket'])->name('ticket');
Route::post('saveContact', [App\Http\Controllers\ContactController::class, 'submitContact']);

Route::prefix('posts')->group(function () {
    Route::post('/saveComment/{id}', [App\Http\Controllers\PostController::class, 'saveComment']);
    Route::get('/', [App\Http\Controllers\PostController::class, 'get_posts']);
});

Route::prefix('trips')->group(function () {
    Route::post('/', [App\Http\Controllers\TripController::class, 'getTrips']);
    Route::post('/reservation/save', [ReservationController::class, 'saveReservation']);
});