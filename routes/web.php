<?php

use App\Http\Controllers\DuesController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', [DuesController::class, 'index'])->name('dues');
    Route::get('/dues/import', [DuesController::class, 'import'])->name('dues.import');
    Route::get('/dues/edit/{id}', [DuesController::class, 'edit'])->name('dues.edit');
    Route::patch('/dues/update/{id}', [DuesController::class, 'update'])->name('dues.update');
    Route::post('/dues/import', [DuesController::class, 'store'])->name('dues.import');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
