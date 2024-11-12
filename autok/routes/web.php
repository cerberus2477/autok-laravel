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
Route::get('vehichles', [VehichleController::class, 'index'])->name('vehichles');
Route::get('vehichles/create', [VehichleController::class, 'create'])->name('createVehichle');
Route::post('vehichles', [VehichleController::class, 'store'])->name('storeVehichle');
Route::get('vehichles/{id}/edit', [VehichleController::class, 'edit'])->name('editVehichle');
Route::patch('vehichles/{id}', [VehichleController::class, 'update'])->name('updateVehichle');
Route::delete('vehichles/{id}', [VehichleController::class, 'destroy'])->name('destroyVehichle');

//---------------------------------------------------------------------------------------------------------------


//MAKER -- ez még a régi
Route::get('makers', [MakerController::class, 'index'])->name('makers');
Route::post('maker', [MakerController::class, 'store'])->name('maker');
Route::get('maker/create', [MakerController::class, 'create'])->name('createMaker');
Route::post('maker/{id}}', [MakerController::class, 'edit'])->name('editMaker');
Route::patch('maker/create', [MakerController::class, 'update'])->name('updateMaker');
Route::delete('maker/{id}', [MakerController::class, 'delete'])->name('deleteMaker');
Route::post('maker/search', [MakerController::class, 'search'])->name('searchMaker');

//CARMODEL -- ez még a régi
Route::get('carModels', [carModelController::class, 'index'])->name('carModels');
Route::post('carModel', [carModelController::class, 'store'])->name('storeCarModel');
Route::get('carModel/create', [carModelController::class, 'create'])->name('createCarModel');
Route::post('carModel/{id}}', [carModelController::class, 'edit'])->name('editCarModel');
Route::patch('carModel/create', [carModelController::class, 'update'])->name('updateCarModel');
Route::delete('carModel/{id}', [carModelController::class, 'delete'])->name('deleteCarModel');
Route::post('carModels/search', [carModelController::class, 'search'])->name('searchCarModel');

//TRIMS
Route::get('trims', [TrimController::class, 'index'])->name('trims');
Route::get('trims/create', [TrimController::class, 'create'])->name('createTrim');
Route::post('trims', [TrimController::class, 'store'])->name('storeTrim');
Route::get('trims/{id}/edit', [TrimController::class, 'edit'])->name('editTrim');
Route::patch('trims/{id}', [TrimController::class, 'update'])->name('updateTrim');
Route::delete('trims/{id}', [TrimController::class, 'destroy'])->name('destroyTrim');

//-----------------------------------------------------------------------------------------------------------------------------------------------

//BODIES
Route::get('bodies', [BodyController::class, 'index'])->name('bodies');
Route::get('bodies/create', [BodyController::class, 'create'])->name('createBody');
Route::post('bodies', [BodyController::class, 'store'])->name('storeBody');
Route::get('bodies/{id}/edit', [BodyController::class, 'edit'])->name('editBody');
Route::patch('bodies/{id}', [BodyController::class, 'update'])->name('updateBody');
Route::delete('bodies/{id}', [BodyController::class, 'destroy'])->name('destroyBody');


//GEARSHIFTS
Route::get('gearshifts', [GearshiftController::class, 'index'])->name('gearshifts');
Route::get('gearshifts/create', [GearshiftController::class, 'create'])->name('createGearshift');
Route::post('gearshifts', [GearshiftController::class, 'store'])->name('storeGearshift');
Route::get('gearshifts/{id}/edit', [GearshiftController::class, 'edit'])->name('editGearshift');
Route::patch('gearshifts/{id}', [GearshiftController::class, 'update'])->name('updateGearshift');
Route::delete('gearshifts/{id}', [GearshiftController::class, 'destroy'])->name('destroyGearshift');


// FUEL
Route::get('fuels', [FuelController::class, 'index'])->name('fuels');
Route::get('fuels/create', [FuelController::class, 'create'])->name('createFuel');
Route::post('fuels', [FuelController::class, 'store'])->name('storeFuel');
Route::get('fuels/{id}/edit', [FuelController::class, 'edit'])->name('editFuel');
Route::patch('fuels/{id}', [FuelController::class, 'update'])->name('updateFuel');
Route::delete('fuels/{id}', [FuelController::class, 'destroy'])->name('destroyFuel');
// Route::post('fuels/search', [FuelController::class, 'search'])->name('searchFuel');
