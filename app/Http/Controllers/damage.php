<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recieving;
use App\Models\Log;
use App\Models\damage as sira;
use App\Models\carstatus;
use Exception;

class damage extends Controller
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
    public function create(Request $request , $id = null)
    {
        //
        $data = recieving::findorfail($id);
        return view('carprofile.damage',['car'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id = null)
    {
        //
        try {
            //code...
            $inputs = $request->all();
            $dents = ($request->has('dents'))?$inputs['dents']:false;
            $dings = ($request->has('dings'))?$inputs['dings']:false;
            $scratches = ($request->has('scratches'))?$inputs['scratches']:false;
            $paintdefects = ($request->has('paintdefects'))?$inputs['paintdefects']:false;
            $damage = ($request->has('damage'))?$inputs['damage']:false;
            $other = ($request->has('other'))?$inputs['other']:false;
            $remark = ($request['remark'])?$request['remark']:'No problem after the checking...';
            sira::create(
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
            return back()->with(['success'=>'the car have been checked....']);
        } catch (Exception $th) {
           return redirect()->back()->with(['msg'=>$th]);
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
            $damagecar = sira::findorFail($id);
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
            return redirect()->back()->with(['success'=>'the car have been Update....']);
        } catch (Exception $th) {
            return redirect()->back()->with(['msg'=>$th]);
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
