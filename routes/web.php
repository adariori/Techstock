<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterventionController;

Route::get('/', function () {
    return redirect()->route('devices.index');
});

Route::resource('devices', DeviceController::class);
Route::resource('rooms', RoomController::class);
Route::resource('categories', CategoryController::class);

Route::post('/devices/{device}/interventions', [InterventionController::class, 'store'])->name('interventions.store');
