<?php
use App\Http\Controllers\client;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\receiving;
use App\Http\Controllers\car;
use App\Http\Controllers\indexcontroller;
// use App\Http\Controllers\invoicecontroller;
// use App\Http\Controllers\looseitems;
use App\Http\Controllers\ImportExportController;
// use App\Http\Controllers\settools;
// use App\Http\Controllers\damage;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\inventory;
use App\Http\Controllers\invoice;
// use App\Http\Controllers\account;
use App\Http\Controllers\blocks;
use App\Http\Controllers\track;
// use App\Http\Controllers\report;
use App\Http\Controllers\blockings;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\batching;
use App\Http\Controllers\released;


use App\Livewire\ClientManagement as LivewireClient;
use App\Livewire\Inventory as LivewireInventory;
use App\Livewire\Recieveing as LivewireRecieveing;
use App\Livewire\Invoice as LivewireInvoice;
use App\Livewire\InvoiceReleased;
use App\Livewire\UnitProfile as LivewireUnitProfile;
use App\Livewire\Account as LivewireAccount;
use App\Livewire\Site as LivewireSite;
use App\Livewire\Released as LivewireReleased;
use App\Livewire\Masterlist as livewireMasterList;
use App\Livewire\Report as LivewireReport;
use App\Livewire\Blockview as LivewireBlocks;
use App\Livewire\Blockingview as LivewireBlockings;
use App\Livewire\Stencil as LivewireStencil;
use App\Livewire\Washing as LivewireWashing;
use App\Livewire\InstaledTools as LivewireInstalledTools;
use App\Livewire\ModelManagement as LivewireModel;
use App\Livewire\Pdi as LivewirePdi;


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


// Client Route

Route::middleware(['auth','web','isClient'])->group(function(){
    Route::controller(ImportExportController::class)->group(function(){
        Route::get('export-units','export');
        Route::get('export-disapproveunits','exportdisapprovedunits');
    });

    Route::controller(track::class)->group(function(){
        Route::get('track','index');
        Route::post('trackproduct','show');
    });


});

// Admin and Super Admin Route

Route::get('cars',[pdfcontroller::class,'showEmployees']);
Route::post('create-pdf',[pdfcontroller::class,'createPDF']);

Route::middleware(['auth','web','areAdmin'])->group(function() {

        //livewire
        Route::get('inventory',LivewireInventory::class);
        Route::get('recieve',LivewireRecieveing::class);
        Route::get('invoice',LivewireInvoice::class)->name('invoice');
        Route::get('releasing/{id}',InvoiceReleased::class);
        Route::get('unit/{id}',LivewireUnitProfile::class);
        Route::get('account',LivewireAccount::class);
        Route::get('site',LivewireSite::class);
        Route::get('released',LivewireReleased::class);
        Route::get('rawdata',livewireMasterList::class);
        Route::get('report',LivewireReport::class);
        Route::get('block-list/{id}',LivewireBlocks::class);
        Route::get('blocking-list/{id}',LivewireBlockings::class);
        Route::get('stencil',LivewireStencil::class);
        Route::get('washing',LivewireWashing::class);
        Route::get("installation",LivewireInstalledTools::class);
        Route::get('client',LivewireClient::class);
        Route::get('model_management/{id}',LivewireModel::class);
        Route::get('pdi',LivewirePdi::class);


        // Route::controller(report::class)->group(function(){
        //     Route::get('report','index');
        //     Route::post('report','fetchdata');
        //     Route::get('total-units','showtotalunits');
        //     Route::get('approved-units','showapproveunits');
        //     Route::get('disapproved-units','showdisapproveunits');
        // });

        // Route::controller(recieveController::class)->group(function(){
        //     Route::get('recieve-units',"index")->name('recive');
        //     Route::get('view-recieve-unit/{id}',"show")->name('showrecieveunit');
        //     Route::put('update-personel/{id}','updatePersonel');
        //     Route::post('searchRecieveUnit','searchRecieveData');
        // });
        // Route::controller(looseitems::class)->group(function(){
        //     Route::get('createloosetools/{id}','create');
        //     Route::post('loose-item/{id}','store');
        //     Route::put('update-loose-item/{id}','update');
        // });
        // Route::controller(settools::class)->group(function(){
        //     Route::get('createsettools/{id}','create');
        //     Route::post('set-tool/{id}','store');
        //     Route::patch('update-set-tool/{id}','update');
        // });
        // Route::controller(damage::class)->group(function(){
        //     Route::get('createdamage/{id}','create');
        //     Route::post('car-damage/{id}','store');
        //     Route::patch('update-car-damage/{id}','update');
        // });

        // Route::controller(inventory::class)->group(function(){
        //     Route::get('inventory', 'index')->name('show-inventory');
        //     Route::get('inventory/{id}','view');
        //     Route::post('search-inventory','searchinventory');
        //     Route::get('viewinventory/{action}','show');
        //     Route::delete('remove-receiving-units/{id}','destroy');
        // });

        Route::controller(invoice::class)->group(function(){
            // Route::get('invoice','index')->name('invoice');
            Route::post('createinvoicedata/{id}','store');
            Route::get('invoice-get/{id}','show')->name('invoice-profile');
            Route::get('upload-Invoice','import');
            Route::put('updateinvoicedata/{id}','update');
            Route::post('updatecarsreleasedata/{id}','updateReleasedDatas');
            Route::post('released-Unit/{id}','release');
        });

        Route::controller(blocks::class)->group(function(){
            Route::get('blocks','index')->name('block');
            Route::post('savedblock','store');
            Route::get('getblocks/{id}','fetchBlocks');
        });

        Route::controller(ImportExportController::class)->group(function(){
            Route::get('export', 'export')->name('export');
            Route::post('uploadInvoice','importInvoice');
        });



        Route::controller(car::class)->group(function(){
            Route::get('insert-data','carform')->name('car-form');//  Displaying form for car detail's
            Route::post('insert-car-details','savecardetail');// saving the detail's in the server`
            Route::post('import', 'import')->name('import');
            Route::get('import_export', 'carformupload');//  Displaying upload form for car detail's
            Route::put('update-blockings/{id}','updateBlockings');
            Route::put('update-cars-Personel/{id}','updateRecieveBy');
        });

        //livewire
        Route::controller(receiving::class)->group(function(){

        });

        Route::controller(released::class)->group(function(){
            Route::get('released-units','index')->name('released');
        });


        Route::controller(CarsController::class)->group(function(){
            Route::get('masterlist','index');
            // Route::get('recieve', 'unitindex')->name('unit-list');
            // Route::get('rawdata', 'rawData')->name('raw-data');
            Route::post('batchingUnit','unitBatching');
            Route::post('filter-rawdata','setFilter');
            Route::post('filter-recievedata','setFilterUnitList');
            Route::post('default-approve/{id}','defaultapprove');
            Route::post('update-inventory/{id}','updatecarstatus');
            Route::post('searchUnitList','searchUnitData');
            Route::post('searchRawData','searchRawData');
            Route::get('view/{id}', 'view')->name('show-profile');
            // Route::put('approved-inventory/{id}', 'approve')->name('approve');
            Route::get('edit-loose-tool/{id}','editloosetool')->name('edit-loose-tool');
            Route::get('edit-set-tool/{id}','editsettool')->name('edit-set-tool');
            Route::get('edit-damage-car/{id}','editdamgecar')->name('edit-damage-car');
            Route::get('showcarprofile/{id}','showcarprofile');
            Route::get('edit-car-status/{id}','editcarstatus');
            Route::get('edit-car-profile/{id}','editcarprofile')->name('edit-car');
        });
        Route::controller(batching::class)->group(function(){
            Route::get('batches', 'index')->name('batch');
            Route::get('delete-batch/{id}','destroy');
            Route::post('create-Recieve','store');
            // Route::put('update-cars-Personel/{id}','updatePersonel');
        });


    });



    //super admin Route

    Route::group(['middleware' => ['areSuperAdmin']], function (){
        // Route::get('account', [account::class, 'index']);
        // Route::post('create-account', [account::class, 'store']);
        // Route::get('profile/{id}', [account::class, 'edit'])->name('admin.profile.edit');
        // Route::patch('profile/{id}', [account::class, 'update'])->name('admin.profile.update');
        // Route::put('password/{id}', [account::class, 'updatepassword'])->name('admin.password.update');
        // Route::patch('updaterole/{id}',[account::class,'updaterole'])->name('admin.role.update');
        // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('health', HealthCheckResultsController::class);


        // Route::controller(client::class)->group(function(){
        //     Route::get('client','index')->name('show-client');
        //     Route::post('store-client','store');
        //     Route::put('update-client-tag/{id}',"update");
        // });

        Route::controller(blockings::class)->group(function(){
            Route::post('import-blockings','importBlockings');
            // Route::get('blocking-list/{id}','displayblockings');
            Route::get('select-blockings/{id}','fetchCar');
            Route::patch('updateBlockings/{id}','update');
            Route::post('saved-invoice-blocking','storeInvoice');
        });


    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
