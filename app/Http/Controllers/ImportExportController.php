<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use App\Imports\carsImport;
use App\Imports\carstatusimport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exceptions\InvalidOrderException;
use App\Models\Log;
use App\Models\cars;
use App\Models\carstatus;

use Redirect;
use Exception;



class ImportExportController extends Controller
{
    public function importExport()
    {
       return view('datagathering.import');
    }

    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function import(Request $request)
    {
        while(empty($error)){
            try{
                //asking if the post method have file
                $validated = $request->validate([
                    'file' => 'required|max:2000',
                ]);
                $extension = request()->file('file')->extension();
                if($extension === "xlsx"){
                    Excel::import(new carsImport, request()->file('file'));
                    // Excel::import(new carstatusimport, request()->file('file'));
                    //  return dd();
                    Log::create([
                        'idNum'=>$request->user()->id,
                        'logs'=>$request->user()->name.' upload Data into the Database'
                    ]);
                    return back()->with(['success' => 'success:: the file has been uploaded succesfully...']);
                }
                else{
                    request()->file('file') == null;
                    return back()->with(['msg' => 'Error:: File must be in Excel Format']);
                }

            }
            catch(Exception  $error){
                return back()->with(['msg' => $error->getMessage()]);
            }

        }


    }


    public function viewcarform(){

        // return dd();
        // $fillable =  app(cars::class)->getFillable();
        return view('datagathering.insert');
    }

    public function savecardetail(Request $request){

        $validated = $request->validate([
            'mmpcmodelcode'=> 'required',
            'mmpcmodelyear'=> 'required',
            'mmpcoptioncode'=> 'required',
            'extcolorcode'=> 'required',
            'modeldescription'=> 'required',
            'exteriorcolor'=> 'required',
            'csno'=> 'required',
            'bilingdate'=> 'required',
            'vehicleidno'=> 'required',
            'engineno'=> 'required',
            'productioncbunumber'=>'required',
            'bilingdocuments'=> 'required',
            'vehiclestockyard'=> 'required',
        ]);

        $inputs = $request->all();

        $modelcode = $inputs['mmpcmodelcode'];
        $modelyear = $inputs['mmpcmodelyear'];
        $captioncode = $inputs['mmpcoptioncode'];
        $colorcode = $inputs['extcolorcode'];
        $description = $inputs['modeldescription'];
        $exteriorcolor = $inputs['exteriorcolor'];
        $csno = $inputs['csno'];
        $bilingdate = $inputs['bilingdate'];
        $vehicleidno = $inputs['vehicleidno'];
        $engineno = $inputs['engineno'];
        $productionnumber = $inputs['productioncbunumber'];
        $billingdocuments = $inputs['bilingdocuments'];
        $vehiclestockyard = $inputs['vehiclestockyard'];


        cars::create([
            //
            'mmpcmodelcode'=> $modelcode,
            'mmpcmodelyear'=> $modelyear,
            'mmpcoptioncode'=> $captioncode,
            'extcolorcode'=> $exteriorcolor,
            'modeldescription'=> $description,
            'exteriorcolor'=> $exteriorcolor,
            'csno'=> $csno,
            'bilingdate'=> $bilingdate,
            'vehicleidno'=> $vehicleidno,
            'engineno'=> $engineno,
            'productioncbunumber'=> $productionnumber,
            'bilingdocuments'=> $billingdocuments,
            'vehiclestockyard'=> $vehiclestockyard,
        ]);

        carstatus::create([
            'vehicleidno'=>$vehicleidno,
            'havebeenpassed'=>false,
            'havebeenchecked'=>false,
            'havebeenreleased'=>false,
            'havebeenstored'=>false,
            'hasloosetool'=>false,
            'hassettool'=>false,
            'hasdamge'=>false
            ]);










        return back();
    }

}
