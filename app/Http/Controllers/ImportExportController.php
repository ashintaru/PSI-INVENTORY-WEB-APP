<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use App\Imports\carsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exceptions\InvalidOrderException;
use Redirect;
use Exception;



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
            //asking if the post method have file 
            if(request()->file('file')){

                //getting the file extension
                $extension = request()->file('file')->extension();

                //checking if the file is an excel
                if($extension === "xlsx"){
                    // dd("Approved");
                    Excel::import(new carsImport, request()->file('file'));
                    return back()->with(['success' => 'Success:: The data have been upload Properly...']);;
                }
                else{
                    return Redirect::back()->with(['msg' => 'Error:: File must be in Excel Format']);
                }
            }
            else{
                return Redirect::back()->with(['msg' => 'Error:: Unkown File']);
            }    
        }
        catch(Exception  $error){
            return Redirect::back()->with(['msg' => $error->getMessage()]);
        }


    }
}
