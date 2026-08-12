<?php

/**
 * @author    ARIORI OLOROUNKO Adéliyi Odjouola Moshood
 * @github    https://github.com/adariori
 * @web       https://portefolio-nine-iota.vercel.app/
 * @contact   adariori3@gmail.com
 * @location  Cotonou, Benin
 *
 * @project   TechStock
 * @version   1.0.0
 * @year      2026
 * @stack     PHP 8.2+, Laravel 12, Blade, Tailwind CSS 4, Vite
 *
 * @license   MIT License
 *            © 2026 ARIORI OLOROUNKO Adéliyi Odjouola Moshood
 *            Permission is hereby granted, free of charge, to use, copy, modify, merge, publish, distribute, sublicense.
 */

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
