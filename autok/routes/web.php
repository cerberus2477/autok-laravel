<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\carModelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('makers', [MakerController::class, 'index'])->name('makers');
// Route::get('makers', [MakerController::class, 'index'])->name('makers');
// Route::post('makers', [MakerController::class, 'save'])->name('maker');
// Route::get('maker/create', [MakerController::class, 'create'])->name('createMakers');

Route::get('carModels', [carModelController::class, 'index'])->name('carModels');

// FUEL
Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::post('fuel', [FuelController::class, 'save'])->name('saveFuel');
Route::get('fuel/create', [FuelController::class, 'create'])->name('createFuel');
Route::post('fuel/{id}}', [FuelController::class, 'edit'])->name('editFuel');
Route::patch('fuel/create', [FuelController::class, 'update'])->name('updateFuel');
Route::delete('fuel/{id}', [FuelController::class, 'delete'])->name('deleteFuel');
Route::post('fuels/search', [FuelController::class, 'search'])->name('searchFuel');