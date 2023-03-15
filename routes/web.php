<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\CarController;


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

Route::group(['prefix' => 'makers'], function(){
    Route::get('', [MakerController::class, 'index'])->name('maker.index');
    Route::get('create', [MakerController::class, 'create'])->name('maker.create');
    Route::post('store', [MakerController::class, 'store'])->name('maker.store');
    Route::get('edit/{maker}', [MakerController::class, 'edit'])->name('maker.edit');
    Route::post('update/{maker}', [MakerController::class, 'update'])->name('maker.update');
    Route::post('delete/{maker}', [MakerController::class, 'destroy'])->name('maker.destroy');
    Route::get('show/{maker}', [MakerController::class, 'show'])->name('maker.show');
 });

 Route::group(['prefix' => 'cars'], function(){
    Route::get('', [CarController::class, 'index'])->name('car.index');
    Route::get('create', [CarController::class, 'create'])->name('car.create');
    Route::post('store', [CarController::class, 'store'])->name('car.store');
    Route::get('edit/{car}', [CarController::class, 'edit'])->name('car.edit');
    Route::post('update/{car}', [CarController::class, 'update'])->name('car.update');
    Route::post('delete/{car}', [CarController::class, 'destroy'])->name('car.destroy');
    Route::get('show/{car}', [CarController::class, 'show'])->name('car.show');

    Route::get('pdf/{car}', [CarController::class, 'pdf'])->name('car.pdf');
 });
 
 

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
