<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\carstatus;
use App\Models\Log;
use App\Models\tool;
use Exception;


class looseitems extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request , $carid = null)
    {
        $data = cars::with('loosetools')->findOrFail($carid);
        return view('carprofile.loosetools',['car'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$carid = null )
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
                    'vehicleid'=>$carid,
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

                // return dd($carid);
                $car = cars::findOrFail($carid);
                $status = carstatus::where('vehicleid',$carid)->first();
                $status->hasloosetool = 1;
                $status->update();
                return redirect()->back()->with(['success' => 'success:: the Car '.$carid .' has been checked....']);
            }
        } catch (Exception $error) {
            //throw $th;
            return redirect()->back()->with(['msg' => $error->getMessage()]);
        }        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        try {
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
                $tools->warantybooklet = $waranty;
                $tools->key = $keyvalue;
                $tools->remotecontrol = $remote;
                $tools->others = $othervalue;
                $tools->update();



                Log::create([
                    'idNum'=>$tools->car->vehicleidno,
                    'logs'=>'Car VI#'. ' '. $tools->vehicleidno .' have been update the loose tools by '. $request->user()->name
                ]);
                return redirect()->back()->with(['success' => 'success:: the tools  has been update']);
            }
        } catch (Exception $th) {
            return redirect()->back()->with(['msg' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
