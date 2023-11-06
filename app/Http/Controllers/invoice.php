<?php

namespace App\Http\Controllers;

use App\Models\blockings;
use App\Models\cars;
use App\Models\invoce;
use Exception;
use App\Models\released;
use Illuminate\Http\Request;

class invoice extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = invoce::with(['car'])->where('status',0)->paginate(25);
        return view('invoice.invoce',['invoices'=>$invoices]);
    }

    public function import(){
        return view('invoice.importInvoice',['collection'=>[]]);
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
        $data = invoce::findOrFail($id);
        $blockdata = blockings::select(['id','bloackname'])->where('blockstatus',0)->where('blockId',12)->get();
        return view('invoice.invoiceprofile',['invoice'=>$data,'blocks'=>$blockdata]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        //
    }

    public function release($carid = null){

        $invoice = invoce::findOrFail($carid);
        $invoice->status = 1;
        $invoice->update();
        $release = released::firstOrCreate([
            'vehicleidno'=>$invoice->vehicleidno
        ],[
            'vehicleidno'=>$invoice->vehicleidno,
            'status'=>1
        ]);
        $release->status = 1;
        $release->save();
        return redirect()->route('invoice')->with(['success'=>'the Unit have been released']);
    }


    public function updateReleasedDatas(Request $request , $carid = null){
        $car = cars::findOrFail($carid);
        $inputs = $request->all();
        $car->dateReleased = $request->dateReleased;
        $car->releasedBy = $request->personel;
        $car->dealer = $request->dealer;
        $car->update();
        // return dd('sc');
        return redirect()->route('invoice');
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

            $Block = blockings::findOrFail($car->getOriginal('blockings'));
            $Block->blockstatus = 0;
            $Block->update();

            $newBlock = blockings::findOrFail($inputs['blockings']);
            $newBlock->blockstatus = 1;
            $newBlock->update();

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
