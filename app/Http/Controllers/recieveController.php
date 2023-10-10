<?php

namespace App\Http\Controllers;
use App\Models\carstatus as recieve;
use App\Models\blocks;
use App\Models\carstatus;
use Illuminate\Http\Request;

class recieveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = recieve::with(['car'])->paginate(25);
        return view('recieve.index',['data'=>$cars]);
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
        $car = recieve::with(['car'])->findOrFail($id);
        $blocks = blocks::all();
        return view('recieve.show-recieve-unit',['car'=>$car,'blocks'=>$blocks]);
    }

    public function updatePersonel($id = null , Request $request){
        $recieve = carstatus::findOrFail($id);
        $recieve->recieveBy = $request["personel"];
        $recieve->update();
        return redirect()->back();
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
