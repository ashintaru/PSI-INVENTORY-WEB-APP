<?php

namespace App\Http\Controllers;
use App\Models\cars;
use Illuminate\Http\Request;

class track extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('track.track',['data'=>null]);
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
    public function show(Request $request)
    {
        $data = cars::with(['invoice'])->where('vehicleidno',$request->search)->first();
        // return dd($data);
        // return redirect()->back()->with(['data'=>$data]);
        return view('track.track',['data'=>$data]);

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
