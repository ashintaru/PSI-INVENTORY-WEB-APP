<?php

namespace App\Http\Controllers;
use App\Models\carstatus as recieve;
use App\Models\blocks;
use App\Models\blockings;
use App\Models\carstatus;
use App\Models\recieving as units;
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
            $cars = units::where('vehicleidno',$search)
            ->get();
            return view('recieve.index',['data'=>$cars]);
        }else{
            $cars = units::paginate(25);
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
        $car = units::findOrFail($id);
        $blocks = blocks::all();
        // return dd($car);
        return view('recieve.show-recieve-unit',['car'=>$car,'blocks'=>$blocks]);
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



    public function updatePersonel($id = null , Request $request){
        $recieve = units::findOrFail($id);
        $recieve->receiveBy = $request["personel"];
        $recieve->update();
        return redirect()->back()->with(['success'=>"Update Successfully"]);
    }

    public function updateBlockings( Request $request , $id = null ){
        $validated = $request->validate([
            'blockings'=> 'required',
        ]);
        $car = units::findOrFail($id);
        if($car->blockings=="empty"){
            $car->blockings = $request->blockings;
            $car->update();
            $blocks = blockings::findOrFail($request->blockings);
            $blocks->blockstatus=1;
            $blocks->update();
        }else{
            $oldBlocking = $car->blockings;
            $car->blockings = $request->blockings;
            $car->update();
            $oldblocks = blockings::findOrFail($oldBlocking);
            $oldblocks->blockstatus=0;
            $oldblocks->update();
            $newblocks = blockings::findOrFail($request->blockings);
            $newblocks->blockstatus=1;
            $newblocks->update();
        }
        return back()->with(['success'=>'Success:: the car have been update properly... ']);
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
