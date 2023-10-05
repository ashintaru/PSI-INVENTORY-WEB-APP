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
use App\Imports\mzdsImport;
use App\Imports\mmpcImport;
use App\Imports\subaruImport;
use App\Imports\Importinvoce;

use Exception;


class ImportExportController extends Controller
{
    public function importExport()
    {
       return view('datagathering.import',[ 'pr'=>""]);
    }



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
                        Excel::import(new Importinvoce, request()->file('file'));
                        return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
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
    public function import(Request $request)
    {

        while(empty($error)){
            try{
                //asking if the post method have file
                $validated = $request->validate([
                    'file' => 'required|max:2000',
                    'tags' => 'required'
                ]);
                // return dd($request->tags);
                $extension = request()->file('file')->extension();
                if($extension === "xlsx"){
                    switch ($request->tags) {
                        case '1':
                            $collection = (new mzdsImport)->import(request()->file('file'));
                            Log::create([
                                'idNum'=>$request->user()->id,
                                'logs'=>$request->user()->name.' upload Data into the Database'
                            ]);
                            return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
                            break;
                        case '2':
                            //MMpc
                            (new mmpcImport)->import(request()->file('file'));
                            Log::create([
                                'idNum'=>$request->user()->id,
                                'logs'=>$request->user()->name.' upload Data into the Database'
                            ]);
                            return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
                            break;
                        case '3':
                            //Subaru import
                            (new subaruImport)->import(request()->file('file'));
                            Log::create([
                                'idNum'=>$request->user()->id,
                                'logs'=>$request->user()->name.' upload Data into the Database'
                            ]);
                            return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
                            break;
                        default:
                            return back()->with(['success' => 'Warning:: the file has been uploaded succesfully but it does not saved in databased','pr'=>'success']);
                            break;
                    }
                }
                else{
                    request()->file('file') == null;
                    return back()->with(['msg' => 'Error:: File must be in Excel Format']);

                }
            }
            catch(Exception  $error){
                // return dd($error);
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
