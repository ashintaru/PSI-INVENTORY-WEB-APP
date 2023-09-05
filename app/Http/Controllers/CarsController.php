<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\Log;
use App\Models\tool;
use App\Models\damage;

use App\Models\set_tool;

use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;
use Redirect;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->paginate(25);
        // return dd($data);
        return view('recieve',['data'=>$data]);
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
        $data = cars::where('vehicleidno', $search)
        ->first();
        return view('searchResult',['data'=>$data]);

    }
    public function view($id = null,$action = 'null')
    {
        $data = cars::where('cars.vehicleidno', $id)
        ->join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->first();

        $set_tools = set_tool::where('vehicleidno',$id)->get();
        $tools = tool::where('vehicleidno',$id)->get();
        $damage = damage::where('vehicleidno',$id)->get();
        $logs = Log::where('idNum',$id)->orderBy('id','desc')->get();

        // return dd(json_decode($tools,true) );
        return view('viewcar',['car'=>$data,'log'=>$logs,'tool'=>$tools,'set_tools'=>$set_tools,'damage'=>$damage]);
    }
    public function approve( $carid = null,Request $request)
    {

        try {
            //code...

            $car = carstatus::where('vehicleidno',$carid)->first();
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
                    $car->update();

                    $mesage = ($result)?"have been passed and approved and now it will be moved to the Good storage by":"have been failed and disapproved and now will be moved to the bad storage for furhter inspection";

                    Log::create([
                        'idNum'=>$carid,
                        'logs'=>'Car VI#'. ' '. $carid .' '.$mesage.' '. $request->user()->name
                    ]);
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

        try {
            $inputs = $request->all();
            if(($request->has('key') && $request->keyvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['msg'=>'Error : submit have been failed due to an null field pls check the form']);
            }else{
                $manual = ($request->has('manual'))?$inputs['manual']:false;
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false;
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false;
                $keyvalue = ($request->has('key'))?$inputs['keyvalue']:false;
                $remote = ($request->has('remote'))?$inputs['remote']:false;
                $othervalue = ($request->has('other'))?$inputs['othervalue']:false;

                tool::create([
                    'vehicleidno'=>$carid,
                    'ownermanual'=>$manual,
                    'warantybooklet'=>$waranty,
                    'key'=>$keyvalue,
                    'remotecontrol'=>$remote,
                    'others'=>$othervalue
                ]);

                Log::create([
                    'idNum'=>$carid,
                    'logs'=>'Car VI#'. ' '. $carid .' have been checked the loose tools by '. $request->user()->name
                ]);

                $car = carstatus::where('vehicleidno',$carid)->first();
                $car->hasloosetool = 1;
                $car->update();

                return redirect()->back()->with(['success' => 'success:: the Car '.$carid .' has been checked....']);

            }
        } catch (Exception $error) {
            //throw $th;
            return redirect()->back()->with(['msg' => $error->getMessage()]);
        }

        // return dd($car);

    }


    public function updateloosetool( Request $request , $id = null)
    {
        try {
            //code...
            $inputs = $request->all();
            if(($request->has('key') && $request->keyvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
                return redirect()->back()->withErrors(['msg'=>'the user should provide ']);
            }else{
                $manual = ($request->has('manual'))?$inputs['manual']:false;
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false;
                $waranty = ($request->has('waranty'))?$inputs['waranty']:false;
                $keyvalue = ($request->has('key'))?$inputs['keyvalue']:false;
                $remote = ($request->has('remote'))?$inputs['remote']:false;
                $othervalue = ($request->has('other'))?$inputs['othervalue']:false;

                $tools = tool::findOrFail($id);
                $tools->ownermanual = $manual;
                $tools->warantybooklet  =$waranty;
                $tools->key = $keyvalue;
                $tools->remotecontrol = $remote;
                $tools->others = $othervalue;
                $tools->update();

                Log::create([
                    'idNum'=>$tools->vehicleidno,
                    'logs'=>'Car VI#'. ' '. $tools->vehicleidno .' have been update the loose tools by '. $request->user()->name
                ]);
                return redirect()->back()->with(['success' => 'success:: the tools  has been update']);
            }
        } catch (Exception $th) {
            return redirect()->back()->with(['msg' => $th]);
        }
    }

    public function editloosetool($id = null){

        $tools = tool::findOrFail($id);
        return view('edit-loose-tool',['data'=>$tools]);

    }


    public function settool(Request $request , $carid = null ){

        try {
            //code...
            $inputs = $request->all();
            if(($request->has('wheelcap') && $request->wheelcapvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
                return redirect()
                ->back()
                ->withInput($request->input())
                ->withErrors(['msg'=>'Error : submit have been failed due to an null field pls check the form']);
            }else{
                $toolbag = ($request->has('toolbag'))?$inputs['toolbag']:false;
                $wheels = ($request->has('4wheels'))?$inputs['4wheels']:false;
                $tirewrench = ($request->has('tirewrench'))?$inputs['tirewrench']:false;
                $cigarettelighter = ($request->has('cigarettelighter'))?$inputs['cigarettelighter']:false;
                $jack = ($request->has('jack'))?$inputs['jack']:false;
                $wheelcap = ($request->has('wheelcap'))?$inputs['wheelcapvalue']:false;
                $openwrench = ($request->has('openwrench'))?$inputs['openwrench']:false;
                $jackhandle = ($request->has('jackhandle'))?$inputs['jackhandle']:false;
                $sparetire = ($request->has('sparetire'))?$inputs['sparetire']:false;
                $atena = ($request->has('atena'))?$inputs['atena']:false;
                $towhook = ($request->has('towhook'))?$inputs['towhook']:false;
                $matting = ($request->has('matting'))?$inputs['matting']:false;
                $slottedscrewdriver = ($request->has('slottedscrewdriver'))?$inputs['slottedscrewdriver']:false;
                $other = ($request->has('other'))?$inputs['othervalue']:false;
                $phillipsscewdriver = ($request->has('phillipsscewdriver'))?$inputs['phillipsscewdriver']:false;


                set_tool::create([
                    'vehicleidno'=>$carid,
                    'toolbag'=>$toolbag,
                    'tirewrench'=>$tirewrench,
                    'jack'=>$jack,
                    'jackhandle'=>$jackhandle,
                    'openwrench'=>$openwrench,
                    'towhook'=>$towhook,
                    'slottedscrewdriver'=>$slottedscrewdriver,
                    'philipsscrewdriver'=>$phillipsscewdriver,
                    'wheels'=>$wheels,
                    'cigarettelighter'=>$cigarettelighter,
                    'wheelcap'=>$wheelcap,
                    'sparetire'=>$sparetire,
                    'antena'=>$atena,
                    'mating'=>$matting,
                    'other'=>$other,
                ]);

                $carstatus = carstatus::where('vehicleidno',$carid)->first();
                $carstatus->hassettool = 1;
                $carstatus->update();
                Log::create([
                    'idNum'=>$carid,
                    'logs'=>'Car VI#'. $carid .' have been check all the tools by'. $request->user()->name
                ]);

                return redirect()->back()->with(['success' => 'success:: the tools  has been update']);
            }
        } catch (Exception $th) {
            return redirect()->back()->with(['msg' => $th]);
        }

    }

    public function editsettool($id = null){

        $tools = set_tool::findorFail($id);

        return view('edit-set-tool',['data'=>$tools]);
    }

    public function updatesettool(Request $request , $id = null ){


        $inputs = $request->all();
        if(($request->has('wheelcap') && $request->wheelcapvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
            return redirect()->back()->withErrors(['msg'=>'the user should provide ']);
        }else{
            $toolbag = ($request->has('toolbag'))?$inputs['toolbag']:false;
            $wheels = ($request->has('4wheels'))?$inputs['4wheels']:false;
            $tirewrench = ($request->has('tirewrench'))?$inputs['tirewrench']:false;
            $cigarettelighter = ($request->has('cigarettelighter'))?$inputs['cigarettelighter']:false;
            $jack = ($request->has('jack'))?$inputs['jack']:false;
            $wheelcap = ($request->has('wheelcap'))?$inputs['wheelcapvalue']:false;
            $openwrench = ($request->has('openwrench'))?$inputs['openwrench']:false;
            $jackhandle = ($request->has('jackhandle'))?$inputs['jackhandle']:false;
            $sparetire = ($request->has('sparetire'))?$inputs['sparetire']:false;
            $atena = ($request->has('atena'))?$inputs['atena']:false;
            $towhook = ($request->has('towhook'))?$inputs['towhook']:false;
            $matting = ($request->has('matting'))?$inputs['matting']:false;
            $slottedscrewdriver = ($request->has('slottedscrewdriver'))?$inputs['slottedscrewdriver']:false;
            $other = ($request->has('other'))?$inputs['othervalue']:false;
            $phillipsscewdriver = ($request->has('phillipsscewdriver'))?$inputs['phillipsscewdriver']:false;

            $tools = set_tool::findorFail($id);
            $tools->toolbag = $toolbag;
            $tools->tirewrench	= $tirewrench;
            $tools->jack = $jack;
            $tools->jackhandle = $jackhandle;
            $tools->openwrench = $openwrench;
            $tools->towhook	 = $towhook;
            $tools->slottedscrewdriver = $slottedscrewdriver;
            $tools->philipsscrewdriver= $phillipsscewdriver;
            $tools->wheels = $wheels;
            $tools->cigarettelighter = $cigarettelighter;
            $tools->wheelcap = $wheelcap;
            $tools->sparetire = $sparetire;
            $tools->antena = $atena;
            $tools->mating = $matting;
            $tools->other = $other;
            $tools->update();






            Log::create([
                'idNum'=>$tools->vehicleidno,
                'logs'=>'Car VI#'. $tools->vehicleidno  .' have been update all the set tools by'. $request->user()->name
            ]);
            return redirect()->back()->with(['success' => 'success:: the tools  has been update']);
        }

    }

    public function editcarprofile($id = null){

        $cars = cars::findorFail($id);

        return view('edit-car-profile',['data'=>$cars]);
    }

    public function updatecardetails(Request $request, $id = null){

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

        $inputs = $request->all();
        $dents = ($request->has('dents'))?$inputs['dents']:false;
        $dings = ($request->has('dings'))?$inputs['dings']:false;
        $scratches = ($request->has('scratches'))?$inputs['scratches']:false;
        $paintdefects = ($request->has('paintdefects'))?$inputs['paintdefects']:false;
        $damage = ($request->has('damage'))?$inputs['damage']:false;
        $other = ($request->has('other'))?$inputs['other']:false;
        $remark = ($request['remark'])?$request['remark']:'No problem after the checking...';



        damage::create(
            [
                'vehicleidno'=>$id,
                'dents'=>$dents,
                'dings'=>$dings,
                'scratches'=>$scratches,
                'paintdefects'=>$paintdefects,
                'damage'=>$damage,
                'other'=>$other,
                'remark'=>$remark
            ]
        );


        $carstatus = carstatus::where('vehicleidno',$id)->first();
        $carstatus->hasdamge= 1;
        $carstatus->update();

        Log::create([
            'idNum'=>$id,
            'logs'=>'Car VI#'. ' '. $id .' have been checked if it have a damage  by '. $request->user()->name
        ]);

        return back()->with(['success'=>'the car have been checked....']);
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

            $car = carstatus::where('vehicleidno',$carid)->first();
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
