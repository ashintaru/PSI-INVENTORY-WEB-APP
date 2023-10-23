<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CarsExport;
use App\Exports\ExportUsers;
use App\Imports\carsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Log;
use App\Models\cars;
use App\Models\carstatus;
use App\Imports\Importinvoce;

use Exception;


class ImportExportController extends Controller
{
    public function importInvoice(Request $request){
        while(empty($error)){
            try{
                //asking if the post method have file
                $validated = $request->validate([
                    'file' => 'required|max:2000',
                ]);
                $extension = request()->file('file')->extension();
                if($extension === "xlsx"){
                    try {
                        // $import = new Importinvoce;
                        Excel::import( new Importinvoce, request()->file('file'));
                        return view('invoice.importInvoice',['collection'=>''])->with(['success'=>'Update Succesfull']);
                    } catch ( \Maatwebsite\Excel\Validators\ValidationException $e) {
                         $failures = $e->failures();
                        return back()->with(['msg' =>$failures]);
                   }
                }else{
                    return back()->with(['msg' => 'Error:: File must be in Excel Format']);
                }
            }catch(Exception  $error){
                return back()->with(['msg' => $error->getMessage()]);
            }
        }
    }
    public function exportapprovedunits(Request $request)
    {
        return (new CarsExport($request->user()->tags,1))->download('approvedunits.xlsx');
    }
    public function exportdisapprovedunits(Request $request)
    {
        return (new CarsExport($request->user()->tags,0))->download('pendingunits.xlsx');
    }

    public function export(Request $request)
    {
        // return Excel::download(new CarsExport, 'invoices.xlsx');
        return (new CarsExport($request->user()->tags))->download('totalunits.xlsx');
    }


    public function viewcarform(){

        // return dd();
        // $fillable =  app(cars::class)->getFillable();
        return view('datagathering.insert');
    }


}
