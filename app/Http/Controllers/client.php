<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client as kleyente;

class client extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = kleyente::all();
        return view('client.index',['client'=>$tags]);
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
            $validated = $request->validate([
                'clientTag' => 'required'
            ]);
            kleyente::create([
                'clientName'=>request()->clientTag,
                'status'=>1
            ]);
            return redirect()->route('show-client')->with(['success'=>'data have been saved']);
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
    public function update(Request $request,$id = NULL)
    {
        //
        $tag = kleyente::findOrFail($id);
        $tag->clientName = $request->clientTag;
        $tag->update();
        return redirect()->route('show-client')->with(['success'=>'data have been Update']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
