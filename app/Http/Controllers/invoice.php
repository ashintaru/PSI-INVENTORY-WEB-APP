<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\invoce;
use App\Models\blocks;
use Exception;
use Illuminate\Http\Request;
use App\Models\invoicedata;
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

    public function import(){
        return view('invoice.importInvoice');
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
        $blockdata = blocks::select(['id','blockname'])->where('status',0)->get();
        return view('invoice.invoiceprofile',['data'=>$data,'blocks'=>$blockdata]);
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
        try {
            //code...
            $invoice = invoce::findOrFail($id);
            invoicedata::create(
                [
                    'invoiceid',
                    'name',
                    'date',
                    'block'
                ]
            )


        } catch (Exception $th) {
            //throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
