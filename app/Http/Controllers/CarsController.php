<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\Log;
use App\Models\tool;
use App\Models\damage;
use App\Models\invoicecount;
use App\Models\set_tool;
use App\Models\invoicelist;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;
use PhpParser\Node\Stmt\Return_;
use Redirect;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $data = cars::
        // join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        // ->paginate(25);
        $data = cars::paginate(25);
        return view('data.recieve',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function view($id = null,$action = 'null')
    {
        $data = cars::where('cars.vehicleidno', $id)
        ->first();
        // return dd(json_decode($tools,true) );
        return view('carprofile.carprofile',['car'=>$data]);
    }

    public function approve( $carid = null,Request $request)
    {

        try {
            //code...

            $car = carstatus::where('vehicleidno',$carid)->first();
            $cars = cars::where('vehicleidno',$carid)->first();
            $result = ($car->hasloosetool == 1 && $car->hassettool == 1 && $car->hasdamge == 1 )?true : false;
            if($result){

                $validated = $request->validate([
                    'status' => 'required',
                ]);
                if(!$validated) {
                    return redirect()->back()->withErrors($validated);
                }else{
                    $inputs = $request->all();
                    $result = ($inputs['status']==1)?1:0;
                    $car->havebeenchecked = 1;
                    $car->havebeenpassed = $result;
                    $invoiceid = $this->preinvoice($cars->modeldescription);
                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furhter inspection";



                    invoicelist::create([
                        'vehicleidno'=>$cars->vehicleidno,
                        'idinvoicecount'=>$invoiceid,
                        'status'=>'pending'
                    ]);

                    // return dd($invoiceid);

                    Log::create([
                        'idNum'=>$carid,
                        'logs'=>'Car VI#'. ' '. $carid .' '.$mesage.' '. $request->user()->name
                    ]);

                    $car->update();
                    return redirect()->route('show-profile',$carid)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);
                }
            }
            else{
                return redirect()->route('show-profile',$carid)->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
            }

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }

        // return dd($car);

    }
    public function submitlooseitem(Request $request , $carid = null)
    {
        // return dd($car);

    }


    public function updateloosetool( Request $request , $id = null)
    {

    }

    public function editloosetool($id = null){

        $tools = tool::findOrFail($id);

        return response()->json($tools);

        // return view('edit-loose-tool',['data'=>$tools]);

    }


    public function settool( $carid = null , Request $request ){


    }

    public function editsettool($id = null){

        $tools = set_tool::findorFail($id);

        return view('edit-set-tool',['data'=>$tools]);
    }

    public function updatesettool(Request $request , $id = null ){

    }

    public function showcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
    }
    public function editcarprofile($id){
        $cars = cars::findorFail($id);
        return response()->json($cars);
        // return view('edit-car-profile',['data'=>$cars]);
        // return response()->json($cars);
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

    public function updatecardamage($id = null, Request $request){


        try {
            //code...
            $damagecar = damage::findorFail($id);

            $inputs = $request->all();
            $dents = ($request->has('dents'))?$inputs['dents']:false;
            $dings = ($request->has('dings'))?$inputs['dings']:false;
            $scratches = ($request->has('scratches'))?$inputs['scratches']:false;
            $paintdefects = ($request->has('paintdefects'))?$inputs['paintdefects']:false;
            $damage = ($request->has('damage'))?$inputs['damage']:false;
            $other = ($request->has('other'))?$inputs['other']:false;
            $remark = ($request['remark'])?$request['remark']:'No problem after the checking...';


            $damagecar->dents = $dents;
            $damagecar->dings = $dings;
            $damagecar->scratches = $scratches;
            $damagecar->paintdefects = $paintdefects;
            $damagecar->damage = $damage;
            $damagecar->other = $other;
            $damagecar->remark = $remark;
            $damagecar->update();
            Log::create([
                'idNum'=>$damagecar->vehicleidno,
                'logs'=>'Car VI#'. ' '. $damagecar->vehicleidno.' have been update if it have a damage  by '. $request->user()->name
            ]);

            return back()->with(['success'=>'the car have been Update....']);
        } catch (Exception $th) {

            return back()->with(['msg'=>$th]);
        }




    }
    public function editcarstatus($id = null){
        $carstatus = carstatus::where('vehicleidno',$id)->first();
        return view('edit-car-status',['data'=>$carstatus]);
    }
    public function updatecarstatus($carid = null , Request $request){
        try {
            //code...
            $car = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
            ->where('vehicleidno',$carid)->get();
            $result = ($car->hasloosetool == 1 && $car->hassettool == 1 && $car->hasdamge == 1 )?true : false;
            if($result){

                $validated = $request->validate([
                    'status' => 'required',
                ]);
                if(!$validated) {
                    return redirect()->back()->withErrors($validated);
                }else{
                    $inputs = $request->all();
                    $result = ($inputs['status']==1)?1:0;
                    $car->havebeenpassed = $result;
                    $car->update();

                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furtehr inspection";
                    Log::create([
                        'idNum'=>$carid,
                        'logs'=>'Car VI#'. ' '. $carid .' '.$mesage.' '. $request->user()->name
                    ]);
                    return redirect()->back()->with(['success' => 'success:: the Car '.$carid .' has been UPDATE PROPERLY....']);
                }
            }
            else{
                return redirect()->back()->with(['msg' => 'Error:: the Car '.$carid .' has been not moved in the virtual storage due to an error pls check all he required form....']);
            }

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }

    }

    public function preinvoice($description){

           if(invoicecount::where('modeldescription',$description)->exists()){
                $invoice = invoicecount::where('modeldescription',$description)->first();
                $id = $invoice->id;
                $invoice->count = $invoice->count + 1;
                $invoice->update();
                return $id;
            }else{
                $invoice = DB::table('invoicecounts')->insertGetId(
                    [ 'modeldescription' => $description ,'count'=>1]
                );
                return $invoice;
            }
    }
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
