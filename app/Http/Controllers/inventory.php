<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventory as inbentaryo;
use Exception;
use Illuminate\Support\Facades\Cache;
use App\Models\cars;
use Illuminate\Support\Facades\Auth;

class inventory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            $id = Auth::user()->id;
            if(Cache::has('search-inv-unit-'.$id)){
                $inventory = inbentaryo::where('status',1)->with(['car'])->with(['car'])
                ->where('vehicleidno',Cache::get('search-inv-unit-'.$id))
                ->get();
                return view('inventory.inventory',['inventory'=>$inventory]);
            }
            else{
                $inventory = inbentaryo::where('status',1)->with(['car'])
                ->paginate(25);
                // return dd($inventory);
                return view('inventory.inventory',['inventory'=>$inventory]);
            }


        } catch (Exception $th) {
            return view('inventory.inventory',['data'=>null,'mgs'=>$th]);
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

    public function searchRecieve($search = null){
        $id = Auth::user()->id;
        if(Cache::has('search-inv-unit-'.$id)){
            Cache::forget('search-inv-unit-'.$id);
            Cache::put('search-inv-unit-'.$id,$search);
        }
        else
            Cache::put('search-inv-unit-'.$id,$search);
    }

    public function resetSearch(){
        $id = Auth::user()->id;
        Cache::forget('search-inv-unit-'.$id);
    }


    public function searchinventory(Request $request){
        // return dd(request()->all());
        switch ($request['process']) {
            case '1':
                # code...
                $this->searchRecieve($request['search']);
                return redirect()->route('show-inventory');

                break;
            case '2':
                $this->resetSearch();
            return redirect()->route('show-inventory');

                break;
            default:
                return dd("magic");
                break;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $action)
    {
        $result = ($action == "passed") ? 1 : 0;
        $inventory = inbentaryo::with('car')->where('invstatus',$result)->paginate(25);
        return view('inventory.inventory',['data'=>$inventory]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    public function view($id = null){
        $data = inbentaryo::with(['car'])->findOrFail($id);
        return view('inventory.inventoryprofile',['data'=>$data]);
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

    }
}
