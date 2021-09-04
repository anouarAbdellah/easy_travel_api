<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '', 'middleware' => 'auth'], function() {
    Route::middleware(['roleChecker:admin'])->group(function () {
        Route::get('/clients', [App\Http\Controllers\UserController::class, 'clients'])->name('clients');
        Route::get('/delete_client/{id}', [App\Http\Controllers\UserController::class, 'delete_client'])->name('delete_client');
        Route::get('/add_client', [App\Http\Controllers\UserController::class, 'add_client'])->name('add_client');
        Route::post('/client', [App\Http\Controllers\UserController::class, 'save_client'])->name('save_client');
        Route::get('/edit_client/{id}', [App\Http\Controllers\UserController::class, 'edit_client'])->name('edit_client');
        Route::post('/update_client/{id}', [App\Http\Controllers\UserController::class, 'update_client'])->name('update_client');
    
        Route::get('/cities', [App\Http\Controllers\CityController::class, 'cities'])->name('cities');
        Route::get('/delete_city/{id}', [App\Http\Controllers\CityController::class, 'delete_city'])->name('delete_city');
        Route::get('/add_city', [App\Http\Controllers\CityController::class, 'add_city'])->name('add_city');
        Route::post('/city', [App\Http\Controllers\CityController::class, 'save_city'])->name('save_city');
        Route::get('/edit_city/{id}', [App\Http\Controllers\CityController::class, 'edit_city'])->name('edit_city');
        Route::post('/update_city/{id}', [App\Http\Controllers\CityController::class, 'update_city'])->name('update_city');
        
        Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'contacts'])->name('contacts');
        Route::get('/contact/{id}', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
    });
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    
    Route::middleware(['roleChecker:client'])->group(function () {
        Route::get('/drivers', [App\Http\Controllers\DriverController::class, 'drivers'])->name('drivers');
        Route::get('/delete_driver/{id}', [App\Http\Controllers\DriverController::class, 'delete_driver'])->name('delete_driver');
        Route::get('/add_driver', [App\Http\Controllers\DriverController::class, 'add_driver'])->name('add_driver');
        Route::post('/driver', [App\Http\Controllers\DriverController::class, 'save_driver'])->name('save_driver');
        Route::get('/edit_driver/{id}', [App\Http\Controllers\DriverController::class, 'edit_driver'])->name('edit_driver');
        Route::post('/update_driver/{id}', [App\Http\Controllers\DriverController::class, 'update_driver'])->name('update_driver');
    
        Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'vehicles'])->name('vehicles');
        Route::get('/delete_vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'delete_vehicle'])->name('delete_vehicle');
        Route::get('/add_vehicle', [App\Http\Controllers\VehicleController::class, 'add_vehicle'])->name('add_vehicle');
        Route::post('/vehicle', [App\Http\Controllers\VehicleController::class, 'save_vehicle'])->name('save_vehicle');
        Route::get('/edit_vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'edit_vehicle'])->name('edit_vehicle');
        Route::post('/update_vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'update_vehicle'])->name('update_vehicle');
    
        Route::get('/trips', [App\Http\Controllers\TripController::class, 'trips'])->name('trips');
        Route::get('/delete_trip/{id}', [App\Http\Controllers\TripController::class, 'delete_trip'])->name('delete_trip');
        Route::get('/add_trip', [App\Http\Controllers\TripController::class, 'add_trip'])->name('add_trip');
        Route::post('/trip', [App\Http\Controllers\TripController::class, 'save_trip'])->name('save_trip');
        Route::get('/edit_trip/{id}', [App\Http\Controllers\TripController::class, 'edit_trip'])->name('edit_trip');
        Route::post('/update_trip/{id}', [App\Http\Controllers\TripController::class, 'update_trip'])->name('update_trip');
    
        Route::get('/posts', [App\Http\Controllers\PostController::class, 'posts'])->name('posts');
        Route::get('/delete_post/{id}', [App\Http\Controllers\PostController::class, 'delete_post'])->name('delete_post');
        Route::get('/add_post', [App\Http\Controllers\PostController::class, 'add_post'])->name('add_post');
        Route::post('/post', [App\Http\Controllers\PostController::class, 'save_post'])->name('save_post');
        Route::get('/edit_post/{id}', [App\Http\Controllers\PostController::class, 'edit_post'])->name('edit_post');
        Route::post('/update_post/{id}', [App\Http\Controllers\PostController::class, 'update_post'])->name('update_post');
        
        Route::get('/reservations', [App\Http\Controllers\ReservationController::class, 'reservations'])->name('reservations');
        Route::get('/reservation/{id}', [App\Http\Controllers\ReservationController::class, 'reservation'])->name('reservation');
    });


    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile');
    Route::post('/update_profile', [App\Http\Controllers\AdminController::class, 'update_profile'])->name('update_profile');

});
