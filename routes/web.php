<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OnParkingController;
use App\Http\Controllers\AutoController;
use Illuminate\Support\Facades\Route;


Route::get('/customers', [CustomerController::class, 'index'])->name('custs.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('custs.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('custs.store');
Route::get('/customers/{cust}/edit', [CustomerController::class, 'edit'])->name('custs.edit');
Route::patch('/customers/{cust}', [CustomerController::class, 'update'])->name('custs.update');
Route::delete('/customers/{cust}', [CustomerController::class, 'destroy'])->name('custs.destroy');

Route::get('/autos/create', [AutoController::class, 'create'])->name('autos.create');
Route::post('/autos', [AutoController::class, 'store'])->name('autos.store');
Route::patch('/autos/{auto}', [AutoController::class, 'update'])->name('autos.update');
Route::delete('/autos/{auto}', [AutoController::class, 'destroy'])->name('autos.destroy');

Route::get('/on_parking', [OnParkingController::class, 'index'])->name('on_parking.index');
Route::get('/on_parking/autos/{cust}', [OnParkingController::class, 'get_autos'])->name('on_parking.get_autos');
Route::patch('/on_parking/{auto}/remove', [OnParkingController::class, 'update_remove'])->name('on_parking.update_remove');
Route::post('/on_parking', [OnParkingController::class, 'store'])->name('on_parking.store');