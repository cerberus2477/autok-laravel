<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\carModelController;
use App\Http\Controllers\VehichleController;
use App\Http\Controllers\TrimController;
use App\Http\Controllers\GearshiftController;
use App\Http\Controllers\BodyController;

Route::get('/', function () {
    return view('home');
});

//VEHICHLES
Route::get('vehichles', [VehichleController::class, 'index'])->name('vehichles');

//---------------------------------------------------------------------------------------------------------------


//MAKER
Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::post('maker', [MakerController::class, 'save'])->name('maker');
Route::get('maker/create', [MakerController::class, 'create'])->name('createMaker');
Route::post('maker/{id}}', [MakerController::class, 'edit'])->name('editMaker');
Route::patch('maker/create', [MakerController::class, 'update'])->name('updateMaker');
Route::delete('maker/{id}', [MakerController::class, 'delete'])->name('deleteMaker');
Route::post('maker/search', [MakerController::class, 'search'])->name('searchMaker');

//CARMODEL
Route::get('carModels', [carModelController::class, 'index'])->name('carModels');
Route::post('carModel', [carModelController::class, 'save'])->name('saveCarModel');
Route::get('carModel/create', [carModelController::class, 'create'])->name('createCarModel');
Route::post('carModel/{id}}', [carModelController::class, 'edit'])->name('editCarModel');
Route::patch('carModel/create', [carModelController::class, 'update'])->name('updateCarModel');
Route::delete('carModel/{id}', [carModelController::class, 'delete'])->name('deleteCarModel');
Route::post('carModels/search', [carModelController::class, 'search'])->name('searchCarModel');

//TRIMS
Route::get('trims', [TrimController::class, 'index'])->name('trims');

//-----------------------------------------------------------------------------------------------------------------------------------------------

//BODIES
Route::get('bodies', [BodyController::class, 'index'])->name('bodies');


//GEARSHIFTS
Route::get('gearshifts', [GearshiftController::class, 'index'])->name('gearshifts');

// FUEL
Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::post('fuel', [FuelController::class, 'save'])->name('saveFuel');
Route::get('fuel/create', [FuelController::class, 'create'])->name('createFuel');
Route::post('fuel/{id}}', [FuelController::class, 'edit'])->name('editFuel');
Route::patch('fuel/create', [FuelController::class, 'update'])->name('updateFuel');
Route::delete('fuel/{id}', [FuelController::class, 'delete'])->name('deleteFuel');
Route::post('fuels/search', [FuelController::class, 'search'])->name('searchFuel');