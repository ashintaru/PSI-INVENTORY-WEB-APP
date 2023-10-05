<?php

namespace App\Http\Controllers;

use App\Models\blockings;
use App\Models\invoce;
use App\Models\blocks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\cars;

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
        return view('invoice.invoce',['invoices'=>$invoices,'cars'=>$data]);

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
    public function store(Request $request ,$id = null)
    {

    }
    /**
     * Display the specified resource.
     */
    public function show($id = null)
    {
        //
        $data = invoce::with('car')->findOrFail($id);
        $blockdata = blocks::select(['id','blockname'])->where('status',0)->get();
        return view('invoice.invoiceprofile',['invoice'=>$data,'blocks'=>$blockdata]);
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
            $validated = $request->validate([
                'date' => 'required',
                'blockings' => 'required',
            ]);

            $inputs = $request->all();
            $invoice = invoce::with(['car'])->findOrfail($id);
            $car = $invoice->car;
            $car->blockings = $inputs['blockings'];
            $invoice->status = 1;
            $invoice->dateModifier = $inputs['date'];

            $oldblocks = blockings::findOrFail($car->getOriginal('blockings'));
            $oldblocks->blockstatus = 0;
            $oldblocks->update();

            $newblocks = blockings::findOrFail($inputs['blockings']);
            $newblocks->blockstatus = 1;
            $newblocks->update();

            $car->update();
            $invoice->update();
            return redirect()->back();
        } catch (Exception $th) {
            return redirect()->back();
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
