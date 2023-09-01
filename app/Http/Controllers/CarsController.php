<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\Log;
use App\Models\tool;
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
    public function view($id = null)
    {
        $data = cars::where('cars.vehicleidno', $id)
        ->join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->first();

        $set_tools = set_tool::where('vehicleidno',$id)->get();
        $tools = tool::where('vehicleidno',$id)->get();
        $logs = Log::where('idNum',$id)->get();

        // return dd(json_decode($tools,true) );
        return view('viewcar',['car'=>$data,'log'=>$logs,'tool'=>$tools,'set_tools'=>$set_tools]);
    }
    public function approve($carid = null,Request $request)
    {

        try {
            //code...

            $car = carstatus::where('vehicleidno',$carid)->first();
            $car->havebeenstored = 1;
            $car->update();

            Log::create([
                'idNum'=>$carid,
                'logs'=>'Car VI#'. ' '. $carid .' have been approved and moved to the storage by  '. $request->user()->name
            ]);



            return redirect()->route('show-profile',$carid)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }

        // return dd($car);

    }
    public function submitlooseitem(Request $request , $carid = null)
    {

        try {
            //code...



            $inputs = $request->all();

            if(($request->has('key') && $request->keyvalue == null)|| ( $request->has('other') && $request->othervalue == null)){
                return redirect()->route('show-profile',$carid)->withErrors(['msg'=>'the user should provide ']);
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

            }

            // return dd($key);





            return redirect()->route('show-profile',$carid)->with(['success' => 'success:: the Car '.$carid .' has been moved in the virtual storage....']);

        } catch (Exception $error) {
            //throw $th;
            return redirect()->route('show-profile',$carid)->with(['msg' => $error->getMessage()]);
        }

        // return dd($car);

    }


    public function updateloosetool( Request $request , $id = null)
    {
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


    }

    public function editloosetool($id = null){

        $tools = tool::findOrFail($id);

        return view('edit-loose-tool',['data'=>$tools]);

    }


    public function settool(Request $request , $carid = null ){

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

    }

    public function editsettool($id = null){

        $tools = set_tool::findorFail($id);

        return view('edit-set-tool',['data'=>$tools]);
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
