<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\TrayController;
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

Route::get('trays', [TrayController::class,'index'])->name('trays.index');

Route::get('trays/{tray}', [TrayController::class,'show'])->name('trays.show');

Route::post('trays', [TrayController::class,'store'])->name('trays.store');

Route::get('plants', [PlantController::class,'index'])->name('plants.index');

Route::get('plants/{plant}', [PlantController::class,'show'])->name('plants.show');
Route::get('plants/{plant}/edit', [PlantController::class,'edit'])->name('plants.edit');
Route::put('plants/{plant}', [PlantController::class,'update'])->name('plants.update');

Route::post('plant', [PlantController::class,'store'])->name('plants.store');

Route::get('cell/{cell}',[\App\Http\Controllers\CellController::class,'show'])->name('cells.show');

Route::post('cell/{cell}/plant',[\App\Http\Controllers\CellPlantController::class,'create'])->name('cell.plant.create');
Route::delete('cell/{cell}/plant',[\App\Http\Controllers\CellPlantController::class,'delete'])->name('cell.plant.delete');

