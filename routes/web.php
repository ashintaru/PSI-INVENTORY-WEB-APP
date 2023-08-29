<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarsController;

use App\Http\Controllers\ImportExportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','web'])->group(function() {
    
    Route::get('upload', function () {
        return view('welcome');
    });

    Route::controller(ImportExportController::class)->group(function(){
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::get('export', 'export')->name('export');
    });

    Route::controller(CarsController::class)->group(function(){
        Route::get('recieve', 'index');
        // Route::post('search', 'show')->name('show');

    });
        
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
