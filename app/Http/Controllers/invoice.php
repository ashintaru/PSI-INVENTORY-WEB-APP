<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\invoce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class invoice extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $data  = DB::table('cars')
                 ->join('invoces','cars.vehicleidno','invoces.vehicleidno')
                 ->selectRaw('count(cars.modeldescription) as model_count ,cars.modeldescription')
                 ->groupBy('modeldescription')
                 ->get();
        $invoices = invoce::paginate(25);

        // return dd($data);
        return view('invoice.invoce',['data'=>$invoices,'data1'=>$data]);

        //
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
    public function show($id = null)
    {
        //
        $data = invoce::with('car')->findOrFail($id);
        return view('invoice.invoiceprofile',['data'=>$data]);
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