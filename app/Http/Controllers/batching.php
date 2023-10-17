<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batching as batch;
use Illuminate\Support\Carbon;
use App\Models\carstatus as recieve;
use Illuminate\Support\Facades\Auth;
use App\Models\blocks;
use App\Models\cars;
use App\Models\recieving as unit;


class batching extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $block = blocks::all();
        $batch =  batch::where('userid',Auth::user()->id)->orderBy('id','asc')->get();
        return view('data.batch',['batches'=>$batch,'blocks'=>$block]);
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
        $inputs = request()->all();
        $validate = $request->validate(
            [
                'datein'=>['required'],
                'datereceive'=>['required']
            ]
        );
        // $timestamp = Carbon::parse($inputs['datein']);
        $batch =  batch::where('userid',Auth::user()->id)->get();
        $vinarray = $batch->pluck('vehicleidno');
        $cars = cars::whereIn('vehicleidno',$vinarray)->get();
        if(count($cars) > 0 ){
            foreach ($cars as $car) {
                unit::create(
                    [
                        'mmpcmodelcode'=>$car->mmpcmodelcode,
                        'mmpcmodelyear'=>$car->mmpcmodelyear,
                        'mmpcoptioncode'=>$car->mmpcoptioncode,
                        'extcolorcode'=>$car->extcolorcode,
                        'modeldescription'=>$car->modeldescription,
                        'exteriorcolor'=>$car->exteriorcolor,
                        'csno'=>$car->csno,
                        'tag'=>$car->tag,
                        'bilingdate'=>$car->bilingdate,
                        'vehicleidno'=>$car->vehicleidno,
                        'engineno'=>$car->engineno,
                        'productioncbunumber'=>$car->productioncbunumber,
                        'bilingdocuments'=>$car->bilingdocuments,
                        'vehiclestockyard'=>$car->vehiclestockyard,
                        'blockings'=>$car->blockings,
                        'receiveBy'=>$car->recieveBy,
                        'dateIn'=>$inputs['datein'],
                        'dateEncode'=>$inputs['datereceive']
                    ]
                );
                $car->delete();
            }
            batch::query()->where('userid',Auth::user()->id)->delete();
            return redirect()->back()->with(['success'=>"Success!!"]);
        }
        else{
           return redirect()->back()->with(['msg'=>"Failled!!"]);
        }
    }

    public function updatePersonel(Request $request , $id = null){
        $recieve = cars::findOrFail($id);
        $recieve->recieveBy = $request["personel"];
        $recieve->update();
        return redirect()->back()->with(['success'=>"Update Successfully"]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id = null)
    {
        $batch = batch::findOrFail($id);
        $batch->delete();
        return redirect()->route('batch');
    }
}
