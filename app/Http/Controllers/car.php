<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;
// use App\Imports\mzdsImport;
// use App\Imports\mmpcImport;
// use App\Imports\subaruImport;
use App\Imports\carsImport;
use App\Models\client;
use App\Models\blockings;
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
       $client = client::all();
       return view('datagathering.import',['data'=>$client]);
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

    public function updateRecieveBy(Request $request , $id = null){
        $validated = $request->validate([
            'personel'=>['required']
        ]);
        $car = cars::findOrFail($id);
        $car->recieveBy = $request->personel;
        $car->update();
        return redirect()->back()->with(['success'=>"Personel Update"]);
    }


    public function updateBlockings(Request $request , $id = null){
        $car = cars::findOrFail($id);
        $validated = $request->validate([
            'blockings'=> 'required',
        ]);
        if($request->blockings == null){
            return back()->with(['msg'=>'Fail']);
        }else{
            switch ($car->blockings) {
                case null:
                    $car->blockings = $request->blockings;
                    $car->update();
                    $blocks = blockings::findOrFail($request->blockings);
                    $blocks->blockstatus=1;
                    $blocks->update();
                    return back()->with(['success'=>'Success:: the car have been update properly... ']);
                    break;
                default:
                    $oldBlocking = $car->blockings;
                    $car->blockings = $request->blockings;
                    $car->update();
                    $oldblocks = blockings::findOrFail($oldBlocking);
                    $oldblocks->blockstatus=0;
                    $oldblocks->update();
                    $newblocks = blockings::findOrFail($request->blockings);
                    $newblocks->blockstatus=1;
                    $newblocks->update();
                    return back()->with(['success'=>'Success:: the car have been update properly... ']);
                    break;
            }
        }
    }
    public function import(Request $request)
    {
        try{
            //asking if the post method have file
            $validated = $request->validate([
                'file' => 'required|max:2000',
                'clientTag' => 'required'
            ]);
            $extension = request()->file('file')->extension();
            if($extension === "xlsx"){
                (new carsImport(request()->clientTag))->import(request()->file('file'));
                return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
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
