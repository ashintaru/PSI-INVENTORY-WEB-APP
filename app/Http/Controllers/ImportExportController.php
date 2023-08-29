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

    public function import(Request $request) 
    {

        try{
            //asking if the post method have file 
            $validated = $request->validate([
                'file' => 'required|max:2000',
            ]);
            $extension = request()->file('file')->extension();
            if($extension === "xlsx"){
                // Excel::import(new carsImport, request()->file('file'));
                return back()->with(['success' => 'Success:: The data have been upload Properly...']);;
            }
            else{
                request()->file('file') == null;
                return Redirect::back()->with(['msg' => 'Error:: File must be in Excel Format']);
            }   

        }
        catch(Exception  $error){
            return Redirect::back()->with(['msg' => $error->getMessage()]);
        }


    }
}
