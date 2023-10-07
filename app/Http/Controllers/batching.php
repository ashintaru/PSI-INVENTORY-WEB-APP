<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\batching as batch;
use Illuminate\Support\Carbon;
use App\Models\carstatus as recieve;
use Illuminate\Support\Facades\Auth;

class batching extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch =  batch::where('userid',Auth::user()->id)->orderBy('id','asc')->get();
        return view('data.batch',['batches'=>$batch]);
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
        // $timestamp = Carbon::parse($inputs['datein']);
        $batch =  batch::where('userid',Auth::user()->id)->get();
        foreach ($batch as $key => $value) {

            recieve::create(
                [
                    'vehicleid'=>$batch[$key]['unitid'],
                    'havebeenpassed'=>false,
                    'havebeenchecked'=>false,
                    'havebeenreleased'=>false,
                    'havebeenstored'=>false,
                    'hasloosetool'=>false,
                    'hassettool'=>false,
                    'hasdamage'=>false,
                    'datein'=>$inputs['datein'],
                    'daterecieve'=>$inputs['datereceive'],
                    'recieveBy'=>null,
                ]
            );
        }

        batch::query()->where('userid',Auth::user()->id)->delete();
        return redirect()->back()->with(['msg'=>"Success!!"]);
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
