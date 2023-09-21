<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;
use Illuminate\Support\Facades\DB;

class report extends Controller
{
    //

    public function index(Request $request)
    {
        $cars = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')->where('tag','=',$request->user()->tags)->get();
        $recived = count( $cars );
        return view('report.report',['cars'=>$cars,'total'=>$recived]);
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
}
