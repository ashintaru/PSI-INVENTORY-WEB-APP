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
}
