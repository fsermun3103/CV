<?php


use App\Http\Controllers\CVController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('image/{id}', [ImageController::class, 'view'])->name('image.view');

Route::get('cv', [CVController::class, 'index'])->name('cv.index');
Route::get('cv/create', [CVController::class, 'create'])->name('cv.create');
Route::post('cv', [CVController::class, 'store'])->name('cv.store');
Route::get('cv/{cv}/edit', [CVController::class, 'edit'])->name('cv.edit');
Route::get('cv/{cv}', [CVController::class, 'show'])->name('cv.show');
Route::put('cv/{cv}', [CVController::class, 'update'])->name('cv.update');
Route::delete('cv/{cv}', [CVController::class, 'destroy'])->name('cv.destroy');
