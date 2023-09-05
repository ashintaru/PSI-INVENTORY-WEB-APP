<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\invenotycontroller;


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

Route::get('/dashboard', [indexcontroller::class,'index'])->middleware(['auth', 'verified','web'])->name('dashboard');

Route::middleware(['auth','web'])->group(function() {

    Route::get('upload', function () {
        return view('welcome');
    });

    Route::controller(invenotycontroller::class)->group(function(){
        Route::get('inventory/{action}', 'index')->name('show-inventory');
        Route::post('search/{action}','search');
    });

    Route::controller(ImportExportController::class)->group(function(){
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::get('export', 'export')->name('export');
        Route::get('insert-data','viewcarform');
        Route::post('insert-car-details','savecardetail')->name('show-car-form');
    });

    Route::controller(CarsController::class)->group(function(){
        Route::get('recieve', 'index');
        Route::post('search', 'show')->name('search');
        Route::get('view/{id}/{action}', 'view')->name('show-profile');
        Route::put('approved-inventory/{id}', 'approve')->name('approve');
        Route::put('update-loose-item/{id}','updateloosetool');
        Route::put('update-set-tool/{id}','updatesettool');

        Route::post('loose-item/{id}','submitlooseitem');
        Route::get('view/{id}', 'view')->name('show-profile');
        Route::get('edit-loose-tool/{id}','editloosetool')->name('edit-loose-tool');
        Route::get('edit-set-tool/{id}','editsettool')->name('edit-set-tool');

        Route::get('edit-damage-car/{id}','editdamgecar')->name('edit-damage-car');


        Route::post('set-tool/{id}','settool');
        Route::get('edit-car-status/{id}','editcarstatus');

        Route::put('update-inventory/{id}','updatecarstatus');

        Route::get('edit-car-profile/{id}','editcarprofile')->name('edit-car-profile');
        Route::put('update-car-details/{id}','updatecardetails');
        Route::post('car-damage/{id}','submitcardamage');
        Route::put('update-car-damage/{id}','updatecardamage');
    });



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// server routes
// https://review42.com/resources/how-to-create-your-server-at-home-for-web-hosting/#:~:text=Hosting%20a%20server%20at%20home,upload%20speed%20for%20residential%20connections.
require __DIR__.'/auth.php';
