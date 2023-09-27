<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\importBlockings;
use App\Models\blockings as spots;
use App\Models\invoicedata;


class blockings extends Controller
{
    //
    public function importBlockings(){
        Excel::import(new importBlockings, request()->file('file'));
        return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);
    }

    public function displayblockings($id=null){
        $data = spots::with('block')->where('blockId',$id)->paginate(25);
        return view('blockings.blockings',['data'=>$data]);

    }

    public function fetchCar($id = null){
        $data = spots::join('invoicedatas','invoicedatas.block','=','blockings.id')
        ->join('invoces','invoces.id','=','invoicedatas.invoiceid')
        ->join('cars','cars.vehicleidno','=','invoces.vehicleidno')
        ->where('blockings.id',$id)->get();
        return response()->json($data);
    }

}
