<?php

namespace App\Http\Controllers;

use App\Models\batching;
use App\Models\cars;
use App\Models\Log;
use App\Models\tool;
use App\Models\damage;
use App\Models\invoicecount;
use App\Models\invoicelist;
use App\Models\invoce;
use App\Models\inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;
use Barryvdh\DomPDF\PDF;
use App\Models\blocks;
use App\Models\blockings;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = cars::with(['batch','status'])->paginate(25);
        return view('data.recieve',['data'=>$data]);
    }


    /**
     * Display the specified resource.
     */
    public function show( Request $req, cars $cars)
    {
        $validated = $req->validate([
            'search' => 'required|min:17',
        ]);
        $search = $req->search;
        $data = cars::
        where('cars.vehicleidno', $search)
        ->get();
        // return back->with()
        return view('data.recieve',['data'=>$data]);
    }

    public function unitBatching(Request $request){

        $input = $request->all();
        $userid = Auth::user()->id;
        foreach ($input as $key => $value) {
            if($key != "_token"){
                batching::create(
                    ['unitid'=>$value,'userid'=>$userid]
                );
            }
        }
        $data = cars::paginate(25);
        return redirect()->route('unit-list');
    }

    public function view($id = null,$action = 'null')
    {
        $data = cars::findOrFail($id);
        return view('data.carprofile',['car'=>$data]);
    }

    public function rawData(){
        $data = cars::paginate(25);
        return view('data.rawdata',['data'=>$data]);
    }

    public function approve( $carid = null,Request $request)
    {
       try {
            $car = cars::with('status')->findOrFail($carid);
            $result = ($car->status->hasloosetool == 1 && $car->status->hassettool == 1 && $car->status->hasdamage == 1 )?true : false;
            if($result){
                $validated = $request->validate([
                    'status' => 'required',
                ]);
                if(!$validated) {
                    return redirect()->back()->withErrors($validated);
                }else{
                    $inputs = $request->all();
                    $result = ($inputs['status'] == 1 ) ? 1 : 0 ;
                    $car->status->havebeenchecked = 1;
                    $car->status->havebeenpassed = $result;
                    $car->status->update();
                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furhter inspection";
                    $this->checkinventory($car,$result);
                    Log::create([
                        'idNum'=>$carid,
                        'logs'=>'Car VI#'. ' '. $carid .' '.$mesage.' '. $request->user()->name
                    ]);

                    return redirect()->route('show-profile',$car->id)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);
                }
            }
            else{
                return redirect()->route('show-profile',$car->id)->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
            }

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$car->id)->with(['msg' => $error->getMessage()]);
        }
    }

    public function checkinvoice( cars $car){
        if(invoce::where('vehicleidno',$car->vehicleidno)->exists()){
            $invoice = invoce::where('vehicleidno',$car->vehicleidno)->first();
            $invoice->status = 0;
            $invoice->update();
        }else{
            invoce::create([
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'status'=>0,
            ]);

        }

    }
    public function  checkinventory(cars $car , $status){
        if(inventory::where('vehicleidno',$car->vehicleidno)->exists()){
            $inventory = inventory::where('vehicleidno',$car->vehicleidno)->first();
            $inventory->invstatus = $status;
            $inventory->update();
        }else{
            inventory::create([
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'invstatus'=>$status,
            ]);
            // return dd($car->vehicleidno);
        }
    }

    public function editloosetool($id = null){

        $tools = tool::findOrFail($id);
        return response()->json($tools);
    }
    public function showcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
    }
    public function editcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
    }


    public function updateBlockings( Request $request , $id = null ){
        $validated = $request->validate([
            'blockings'=> 'required',
        ]);

        $car = cars::findOrFail($id);
        if($car->blockings=="empty"){
            $car->blockings = $request->blockings;
            $car->update();
            $blocks = blockings::findOrFail($request->blockings);
            $blocks->blockstatus=1;
            $blocks->update();
        }else{
            $oldBlocking = $car->blockings;
            $car->blockings = $request->blockings;
            $car->update();
            $oldblocks = blockings::findOrFail($oldBlocking);
            $oldblocks->blockstatus=0;
            $oldblocks->update();
            $newblocks = blockings::findOrFail($request->blockings);
            $newblocks->blockstatus=1;
            $newblocks->update();


        }

        return back()->with(['success'=>'Success:: the car have been update properly... ']);


    }

    public function updatecardetails(Request $request, $id = null){

        $validated = $request->validate([
            'mmpcmodelcode'=> 'required',
            'mmpcmodelyear'=> 'required|numeric|min:2000|max:3000',
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

        $car = cars::findorFail($id);
        $car->mmpcmodelcode = $modelcode;
        $car->mmpcmodelyear = $modelyear;
        $car->mmpcoptioncode = $captioncode;
        $car->extcolorcode = $colorcode;
        $car->modeldescription = $description;
        $car->exteriorcolor = $exteriorcolor;
        $car->csno  =$csno;
        $car->bilingdate = $bilingdate;
        $car->vehicleidno = $vehicleidno;
        $car->engineno  = $engineno;
        $car->productioncbunumber = $productionnumber;
        $car->bilingdocuments = $billingdocuments;
        $car->vehiclestockyard = $vehiclestockyard;
        $car->update();

        return back()->with(['success'=>'Success:: the car have been update properly... ']);
    }
    public function submitcardamage(Request $request , $id = null){

    }


    public function editdamgecar($id = null){
        $damage = damage::findorFail($id);
        return view('edit-car-damage',['data'=>$damage]);
    }

    public function editcarstatus($id = null){
        $carstatus = carstatus::where('vehicleidno',$id)->first();
        return view('edit-car-status',['data'=>$carstatus]);
    }
    public function updatecarstatus($carid = null , Request $request){
        try {
            // return dd($request->all());
            $car = cars::where('id',$carid)->first();
            $result = ($car->status->hasloosetool == 1 && $car->status->hassettool == 1 && $car->status->hasdamage == 1 )?true : false;
            // return dd($result);
            if($result){
                $car->status->havebeenchecked = 1;
                $validated = $request->validate([
                    'status' => 'required',
                ]);
                if(!$validated){
                    return redirect()->back()->withErrors($validated);
                }else{
                    $inputs = $request->all();
                    $result = ($inputs['status']==1) ? 1 : 0;
                    $car->status->havebeenpassed = $result;
                    $car->status->update();
                    $this->checkinventory($car,$result);
                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furtehr inspection";
                    Log::create([
                        'idNum'=>$car->vehicleidno,
                        'logs'=>'Car VI#'. ' '. $car->vehicleidno .' '.$mesage.' '. $request->user()->name
                    ]);
                    return redirect()->back()->with(['success' => 'success:: the Car '.$carid .' has been UPDATE PROPERLY....']);
                }
            }
            else{
                return redirect()->back()->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
            }

        } catch (Exception $error) {
            return redirect()->back()->with(['msg' => $error->getMessage()]);
        }

    }

    // public function preinvoice($description){

    //        if(invoicecount::where('modeldescription',$description)->exists()){
    //             $invoice = invoicecount::where('modeldescription',$description)->first();
    //             $id = $invoice->id;
    //             $invoice->count = $invoice->count + 1;
    //             $invoice->update();
    //             return $id;
    //         }else{
    //             $invoice = DB::table('invoicecounts')->insertGetId(
    //                 [ 'modeldescription' => $description ,'count'=>1]
    //             );
    //             return $invoice;
    //         }
    // }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cars $cars)
    {
        //
    }

}
