<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = cars::paginate(25);
        // return dd($data);
        return view('recieve',['data'=>$data]);
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
    public function show( Request $req, cars $cars)
    {
        $validated = $req->validate([
            'search' => 'required|min:17',
        ]);

        $search = $req->search;

        $data = cars::where('vehicleidno', $search)
        ->first();
        return view('searchResult',['data'=>$data]);
    }
    public function view($id = null)
    {
        

        $data = cars::where('cars.vehicleidno', $id)
        ->join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
        ->first();
        // return dd($data);
        return view('viewcar',['car'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cars $cars)
    {
        //
    }
}
