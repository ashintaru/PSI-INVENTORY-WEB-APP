<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\inventory;
use Illuminate\Support\Facades\DB;

class report extends Controller
{
    //

    public function index(Request $request)
    {
        return view('report.report',['data'=>'']);
    }
    public function showtotalunits(Request $request){
        $cars = cars::where('tag','=',$request->user()->tags)->paginate(25);
        return view('report.partials.totalunits',['data'=>$cars]);
    }
    public function showapproveunits(Request $request){
        $cars = cars::join('carstatus','cars.vehicleidno','=','carstatus.vehicleidno')
        ->where('tag','=',$request->user()->tags)
        ->where('carstatus.havebeenpassed','=',1)
        ->paginate(25);
        return view('report.partials.approvedunits',['data'=>$cars]);
    }
    public function showdisapproveunits(Request $request){
        $cars = cars::join('carstatus','cars.vehicleidno','=','carstatus.vehicleidno')
        ->where('tag','=',$request->user()->tags)
        ->where('carstatus.havebeenpassed','=',0)
        ->paginate(25);
        return view('report.partials.approvedunits',['data'=>$cars]);
    }
    public function fetchdata(Request $request){
        $inputs = $request->all();
        $data='';
        if($inputs['process'] == "search"){
            if($inputs['action'] == 1 ){
                if( $inputs['start'] == null || $inputs['end'] == null){
                    $data = inventory::join('cars','cars.vehicleidno','=','inventories.vehicleidno')
                    ->where('cars.tag',$request->user()->tags)
                    ->paginate(25);
                }else{
                    $data = inventory::join('cars','cars.vehicleidno','=','inventories.vehicleidno')
                    ->where('cars.tag',$request->user()->tags)
                    ->whereBetween('inventories.created_at',[$inputs['start'],$inputs['end']])
                    ->paginate(25);
                }
            }
            if($inputs['action'] == 2 ){
                if($inputs['start'] == null ||$inputs['end'] == null){
                    $data = invoce::join('cars','cars.vehicleidno','=','invoces.vehicleidno')
                    ->where('cars.tag',$request->user()->tags)
                    ->paginate(25);
                }else{
                    $data = invoce::join('cars','cars.vehicleidno','=','invoces.vehicleidno')
                    ->where('cars.tag',$request->user()->tags)
                    ->whereBetween('invoces.created_at',[$inputs['start'],$inputs['end']])
                    ->paginate(25);
                }
            }
        }

        return view('report.report',['data'=>$data]);
    }
}
