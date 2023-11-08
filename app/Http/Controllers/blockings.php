<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\importBlockings;
use App\Models\blockings as spots;
use App\Models\blockings as ModelsBlockings;
use App\Models\cars;
use App\Models\invoicedata;
use Exception;
use App\Models\inventory;


class blockings extends Controller
{
    //
    public function importBlockings()
    {
        Excel::import(new importBlockings(request()->block), request()->file('file'));
        return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
    }

    public function storeInvoice(Request $request){
        $validate = request()->validate([
            'blocks'=>['required']
        ]);

        try {
            //code...
            spots::create([
                'blockId'=>000,
                'bloackname'=>$request->blocks,
                'blockstatus'=>false,
            ]);

            return redirect()->route('block');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('block')->with(['msg',$th]);
        }

    }

    public function displayblockings($id=null)
    {
        $data = spots::with('block')->where('blockId',$id)->paginate(25);
        return view('blockings.blockings',['data'=>$data]);

    }

    public function update( Request $request , $id = null)
    {
        try {
            $validate = $request->validate([
                'blockname' => 'required',
            ]);
            $inputs = $request->all();
            $blocking = spots::findOrFail($id);
            $blocking->bloackname = $inputs['blockname'];
            $blocking->save();
            return back()->with(['success'=>'The Blocking have been update properly']);
        } catch (Exception $e) {
            return back()->with(['msg'=>$e]);
        }
    }

    public function fetchCar($id = null){
        $car = cars::where('blockings',$id)->first();
        // $data = spots::join('inventories','inventories.blockings','=','blockings.id')
        // ->where('blockings.id',$id)->get();
        return response()->json($car);
    }

}
