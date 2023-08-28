<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use App\Imports\carsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exceptions\InvalidOrderException;

class ImportExportController extends Controller
{
    public function importExport()
    {
       return view('import');
    }

    public function export() 
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function import() 
    {
        // try{
        //     Excel::import(new carsImport, request()->file('file'));
            
        //     return back();
     
        // }
        // catch( ModelNotFoundException $exception ){
        //     return back()->withError($exception->getMessage())->withInput();
        // }
        try{
            if(request()->file('file')){
                $extension = request()->file('file')->extension();
                if($extension === "xls"){
                    dd("Approved");
                }
                else{
                    dd("File is disregard");
                }
            }
            else{
                return Redirect::back()->withErrors(['msg' => 'The Message']);
            }    
            return Redirect::back();
        }catch(InvalidOrderException $error){
            return Redirect::back()->withErrors(['msg' => $error]);
        }


    }
}
