<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\set_tool;
use App\Models\Log;
// use App\Models\cars;
use App\Models\recieving;
use App\Models\carstatus;
use Exception;



class settools extends Controller
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
        $data = recieving::findOrFail($carid);
        return view('carprofile.settools',['car'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($carid = null , Request $request)
    {
        try {
            $inputs = $request->all();
            if( ($request->has('wheelcap') && $request->wheelcapvalue == 0) ||
                ($request->has('other') && $request->othervalue == 0 )){
                return
                redirect()
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
                return redirect()->back()->with(['success' => 'success:: the tools  has been update']);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


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
