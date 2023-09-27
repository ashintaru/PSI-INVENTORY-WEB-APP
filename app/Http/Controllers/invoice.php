<?php

namespace App\Http\Controllers;

use App\Models\blockings;
use App\Models\invoce;
use App\Models\blocks;
use Exception;
use Illuminate\Http\Request;
use App\Models\invoicedata;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request ,string $id)
    {
                //
                try {
                    //code...
                    $validated = $request->validate([
                        'date' => 'required',
                        'blockings' => 'required',
                    ]);

                    $inputs = $request->all();
                    $invoice = invoce::findOrFail($id);
                    // return dd($inputs);
                    $invoice->status = 1;
                    $invoice->save();
                    $blocks = blockings::findOrFail($inputs['blockings']);
                    $blocks->blockstatus=1;
                    $blocks->save();
                    invoicedata::create([
                            'invoiceid'=>$id,
                            'name'=>$inputs['name'],
                            'date'=>$inputs['date'],
                            'block'=>$inputs['blockings']
                        ]);
                        return redirect()->back();
                } catch (Exception $th) {
                    //throw $th;
                }

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
                    $validated = $request->validate([
                        'date' => 'required',
                        'blockings' => 'required',
                    ]);

                    $inputs = $request->all();

                    // return $request->all();

                    $invoicedata = invoicedata::findOrfail($id);
                    $recentBlockings = $invoicedata->block;
                    $invoicedata->name = Auth::user()->name;
                    $invoicedata->date = $inputs['date'];
                    $invoicedata->block = $inputs['blockings'];
                    $invoicedata->save();

                    $pastBlockings = blockings::findOrFail($recentBlockings);
                    $pastBlockings->blockstatus=0;
                    $pastBlockings->save();


                    $blocks = blockings::findOrFail($inputs['blockings']);
                    $blocks->blockstatus=1;
                    $blocks->save();

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
