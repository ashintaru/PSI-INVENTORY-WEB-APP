<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;
use App\Imports\mzdsImport;
use App\Imports\mmpcImport;
use App\Imports\subaruImport;
use Exception;

class car extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Displaying Form for Car detail's
     */
    public function carform(){
       return view('datagathering.insert');
    }
    /**
     * Displaying a form for uploading car details
     */
    public function carformupload()
    {
       return view('datagathering.import');
    }
    /**
     * Saving the details that came from manual form
     */
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

        try {
            cars::create([
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
        } catch (Exception $e) {
               return redirect()->route('car-form')->with(['msg'=>$e]);
        }
        return redirect()->route('car-form')->with(['success'=>'The Unit have been upload successfully']);
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
                $extension = request()->file('file')->extension();
                if($extension === "xlsx"){
                    switch ($request->tags) {
                        case '1':
                            $collection = (new mzdsImport)->import(request()->file('file'));
                            return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
                            break;
                        case '2':
                            //MMpc
                            (new mmpcImport)->import(request()->file('file'));
                            return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
                            break;
                        case '3':
                            //Subaru import
                            (new subaruImport)->import(request()->file('file'));
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





}
