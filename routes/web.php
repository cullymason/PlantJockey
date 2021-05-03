<?php

use App\Http\Controllers\CellController;
use App\Http\Controllers\CellPlantController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::get('trays', [TrayController::class,'index'])->middleware('auth')->name('trays.index');

Route::get('trays/{tray}', [TrayController::class,'show'])->middleware('auth')->name('trays.show');

Route::post('trays', [TrayController::class,'store'])->middleware('auth')->name('trays.store');

Route::get('plants', [PlantController::class,'index'])->middleware('auth')->name('plants.index');

Route::get('plants/{plant}', [PlantController::class,'show'])->middleware('auth')->name('plants.show');
Route::get('plants/{plant}/edit', [PlantController::class,'edit'])->middleware('auth')->name('plants.edit');
Route::put('plants/{plant}', [PlantController::class,'update'])->middleware('auth')->name('plants.update');
Route::post('plants', [PlantController::class,'store'])->middleware('auth')->name('plants.store');

Route::get('cells/{cell}',[CellController::class,'show'])->middleware('auth')->name('cells.show');
Route::put('cells/{cell}',[CellController::class,'update'])->middleware('auth')->name('cells.update');

Route::post('cells/{cell}/plant',[CellPlantController::class,'create'])->middleware('auth')->name('cell.plant.create');
Route::delete('cells/{cell}/plant',[CellPlantController::class,'delete'])->middleware('auth')->name('cell.plant.delete');

require __DIR__.'/auth.php';
