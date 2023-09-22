<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\indexcontroller;
use App\Http\Controllers\invenotycontroller;
use App\Http\Controllers\invoicecontroller;
use App\Http\Controllers\looseitems;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\settools;
use App\Http\Controllers\damage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inventory;
use App\Http\Controllers\invoice;
use App\Http\Controllers\account;
use App\Http\Controllers\blocks;
use App\Http\Controllers\track;
use App\Http\Controllers\report;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;


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
Route::controller(track::class)->group(function(){
    Route::get('track','index');
    Route::post('trackproduct','show');
});

Route::controller(ImportExportController::class)->group(function(){
        Route::get('export-units','export');
        Route::get('export-disapproveunits','exportdisapprovedunits');
});

Route::get('/dashboard', [indexcontroller::class,'index'])->middleware(['auth', 'verified','web'])->name('dashboard');
    Route::middleware(['auth','web','areAdmin'])->group(function() {

        Route::controller(ImportExportController::class)->group(function(){
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::get('export', 'export')->name('export');
        Route::get('insert-data','viewcarform');
        Route::post('insert-car-details','savecardetail')->name('show-car-form');
        Route::post('uploadInvoice','importInvoice');

        });
        Route::controller(invoicecontroller::class)->group(function(){
            Route::get('invoice/{id}','index');
        });
        Route::controller(looseitems::class)->group(function(){
            Route::post('loose-item/{id}','store');
            Route::patch('update-loose-item/{id}','update');
        });
        Route::controller(settools::class)->group(function(){
            Route::post('set-tool/{id}','store');
            Route::patch('update-set-tool/{id}','update');
        });
        Route::controller(damage::class)->group(function(){
            Route::post('car-damage/{id}','store');
            Route::patch('update-car-damage/{id}','update');
        });
        Route::controller(inventory::class)->group(function(){
            Route::get('inventory', 'index')->name('show-inventory');
            Route::post('searchinventory','searchinventory');
            Route::get('viewinventory/{action}','show');
        });
        Route::controller(invoice::class)->group(function(){
            Route::get('invoice','index');
            Route::post('createinvoicedata/{id}','update');
            Route::get('invoice-get/{id}','show');
            Route::get('upload-Invoice','import');
        });



        Route::controller(blocks::class)->group(function(){
            Route::get('blocks','index');
            Route::post('savedblock','store');
            Route::get('getblocks/{id}','fetchBlocks');
        });

        Route::controller(CarsController::class)->group(function(){
            Route::patch('approved-inventory/{id}', 'approve')->name('approve');
            Route::patch('update-inventory/{id}','updatecarstatus');
            Route::get('recieve', 'index');
            Route::post('search', 'show')->name('search');
            Route::get('view/{id}/{action}', 'view')->name('show-profile');
            Route::get('view/{id}', 'view')->name('show-profile');
            Route::get('edit-loose-tool/{id}','editloosetool')->name('edit-loose-tool');
            Route::get('edit-set-tool/{id}','editsettool')->name('edit-set-tool');
            Route::get('edit-damage-car/{id}','editdamgecar')->name('edit-damage-car');
            Route::get('showcarprofile/{id}','showcarprofile');
            Route::get('edit-car-status/{id}','editcarstatus');
            Route::get('edit-car-profile/{id}','editcarprofile')->name('edit-car');
            Route::put('update-car-details/{id}','updatecardetails');
        });
    });

    Route::controller(report::class)->group(function(){
        Route::get('report','index');
        Route::get('total-units','showtotalunits');
        Route::get('approved-units','showapproveunits');
        Route::get('disapproved-units','showdisapproveunits');
    });

    Route::group(['middleware' => ['status']], function (){
        Route::get('account', [account::class, 'index']);
        Route::post('create-account', [account::class, 'store']);
        Route::get('profile/{id}', [account::class, 'edit'])->name('admin.profile.edit');
        Route::patch('profile/{id}', [account::class, 'update'])->name('admin.profile.update');
        Route::put('password/{id}', [account::class, 'updatepassword'])->name('admin.password.update');
        Route::patch('updaterole/{id}',[account::class,'updaterole'])->name('admin.role.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('health', HealthCheckResultsController::class);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });



require __DIR__.'/auth.php';
