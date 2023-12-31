<?php

namespace App\Http\Controllers;
use App\Models\blocks;
use App\Models\blockings;
use App\Models\recieving as units;
use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class recieveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $id = Auth()->user()->id;
        if (Cache::has("searchReceiveData-".$id)){
            $search = Cache::get("searchReceiveData-".$id);
            $cars = units::where('status',0)->with(['car'])->where('vehicleidno',$search)
            ->get();
            return view('recieve.index',['data'=>$cars]);
        }else{
            $cars = units::where('status',0)->with(['car'])->paginate(25);
            // return dd($cars);
            return view('recieve.index',['data'=>$cars]);
        }

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
    public function show(string $id)
    {
        //
        $car = units::with(['car','settools','loosetools','damage'])->findOrFail($id);
        $blocks = blocks::all();
        // return dd($car);
        return view('recieve.show-recieve-unit',['recieve'=>$car,'blocks'=>$blocks]);
    }

    public function resetSearchReceiveData(){
        $id=Auth()->user()->id;
        Cache::forget("searchReceiveData-".$id);
        // Cache::forget("searchReceiveData- ".$id);
        return redirect()->route('recive');

    }

    public function searchRecieveData(Request $request){
        $id=Auth()->user()->id;
        switch ($request['process']) {
            case '1':
                    if (Cache::has("searchReceiveData-".$id)) {
                        Cache::forget("searchReceiveData-".$id);
                        Cache::put("searchReceiveData-".$id,$request['search']);
                    }else{
                        Cache::put("searchReceiveData-".$id,$request['search']);
                    }
                break;
            case '2':
                    $this->resetSearchReceiveData();
                break;
        }
        return redirect()->route('recive');
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
    public function destroy(string $id)
    {
        //
    }
}
