<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blocks as bloke;
use Illuminate\Support\Facades\DB;
use Exception;

class blocks extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('blocks.blocks');
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

        try {
            //code...
            $input = $request->all();
            $validate = $request->validate([
                'blocks'=>'required'
            ]);
            bloke::create([
                'blocks'=>$input['blocks'],
                'status'=>0
            ]);
            return redirect()->back()->with(['success'=>"save copletely"]);
        } catch (Exception $th) {
            //throw $th;
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
