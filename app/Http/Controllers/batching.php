<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batching as batch;
use Illuminate\Support\Facades\Auth;
use Exception;
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
        $batch =  batch::with('car')->where('userid',Auth::user()->id)->orderBy('id','asc')->get();
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
        try {
            //code...
            $batch =  batch::where('userid',Auth::user()->id)->get();
            $vinarray = $batch->pluck('vehicleidno');
            $cars = cars::whereIn('vehicleidno',$vinarray)->get();
            if(count($cars) > 0 ){
                foreach ($cars as $car) {
                    unit::create(
                        [
                            'vehicleidno'=>$car->vehicleidno,
                            'status'=>0
                        ]
                    );
                    $car->status = 1;
                    $car->update();
                }
                batch::query()->where('userid',Auth::user()->id)->delete();
                return redirect()->route('batch')->with(['success'=>"Success!!"]);
            }
            else{
               return redirect()->route('batch')->with(['msg'=>"Failled!!"]);
            }
        } catch (Exception $th) {
            //throw $th;
            return redirect()->route('batch')->with(['msg'=>$th]);
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
        return redirect()->route('batch')->with(['msg'=>'Removed Successfully']);
    }
}
