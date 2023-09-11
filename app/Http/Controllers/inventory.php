<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inventory as inbentaryo;
use Exception;



class inventory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $inventory = inbentaryo::with(['car'])->paginate(25);
            // return dd($inventor);
            return view('inventory.inventory',['data'=>$inventory]);
        } catch (Exception $th) {
            //throw $th;
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

    public function searchinventory(Request $request){
        $inventory = inbentaryo::with('car')->where('vehicleidno','LIKE',$request['search'])->get();
        return view('inventory.inventory',['data'=>$inventory]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $action)
    {
        //
        $result = ($action == "passed")?1:0;
        $inventory = inbentaryo::with(['car'])->where('invstatus',$result)->paginate(25);
        return view('inventory.inventory',['data'=>$inventory]);

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
