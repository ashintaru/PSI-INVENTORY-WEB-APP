<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\inventoryExport;
use App\Exports\invoiceExport;
use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\inventory;
use App\Models\invoce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class report extends Controller
{
    //

    public function index(Request $request)
    {
        return view('report.report',['data'=>'','date'=>'','process'=>'']);
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
        $date = array();
        $process = $inputs['action'] ;

        if(Auth::user()->role !=3 )
            $tags = null;
        else
             $tags =$request->user()->tags;


        $data='';
        if($inputs['process'] == "search"){
            if($inputs['action'] == 1 ){
                if( $inputs['start'] == null || $inputs['end'] == null){
                    if($tags == null)
                        $data = inventory::with(['car'])->paginate(25);
                    else{
                        $data = inventory::with(['car'])->where('tag',$tags)->paginate(25);
                    }
                }else{
                    $startdate = Carbon::parse($inputs['start'])->toDateTimeString();
                    $enddate = Carbon::parse($inputs['end'])->toDateTimeString();
                    if($tags == null)
                        $data = inventory::with(['car'])->whereBetween('inventories.created_at',[$startdate,$enddate])->paginate(25);
                    else{
                        $data = inventory::with(['car'])->where('tag',$tags)
                        ->whereBetween('inventories.created_at',[$startdate,$enddate])
                        ->paginate(25);
                    }
                }
            }
            elseif($inputs['action'] == 2 ){
                if($inputs['start'] == null ||$inputs['end'] == null){
                    if($tags == null){
                        $data = invoce::paginate(25);
                    }
                    else{
                        $data = invoce::where('cars.tag',$request->user()->tags)
                        ->paginate(25);
                    }
                }else{
                    $startdate = Carbon::parse($inputs['start'])->toDateTimeString();
                    $enddate = Carbon::parse($inputs['end'])->toDateTimeString();
                    if($tags == null){
                        $data = invoce::whereBetween('invoces.created_at',[$startdate,$enddate])
                        ->paginate(25);
                    }
                    else{
                        $data = invoce::where('cars.tag',$tags)
                        ->whereBetween('invoces.created_at',[$startdate,$enddate])
                        ->paginate(25);
                    }

                }
            }
        }elseif($inputs['process'] == "download"){
            if($inputs['action'] == 1 ){
                $startdate = Carbon::parse($inputs['start'])->toDateTimeString();
                $enddate = Carbon::parse($inputs['end'])->toDateTimeString();
                $date = Carbon::now()->format('Y-m-d');
                $name = "inventory-Report".$date;
                if($tags == null && $startdate == null || $enddate == null)
                    return (new inventoryExport('','',''))->download($name.'.xlsx');
                else{
                    return (new inventoryExport($tags,$startdate,$enddate))->download($name.'.xlsx');
                }
            }
            elseif($inputs['action'] == 2 ){
                $startdate = Carbon::parse($inputs['start'])->toDateTimeString();
                $enddate = Carbon::parse($inputs['end'])->toDateTimeString();
                $date = Carbon::now()->format('Y-m-d');
                $name = "inventory-Report".$date;
                if($tags == null){
                    return (new invoiceExport('',$startdate,$enddate))->download($name.'.xlsx');
                }
                else{
                    return (new inventoryExport($tags,$startdate,$enddate))->download($name.'.xlsx');
                }
            }
        }
        array_push($date,$inputs['start']);
        array_push($date,$inputs['end']);
        return view('report.report',['data'=>$data,'date'=>$date,'process'=>$process]);
    }
}
