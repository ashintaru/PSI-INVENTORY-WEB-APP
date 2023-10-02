<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\invoicecount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;

class indexcontroller extends Controller
{
    //
    public function index(){

        if(Auth::user()->role != 1 && Auth::user()->role != 2){
            // return dd('client');
            return view('dashboard',['cars'=>'','inventories'=>'']);
        }
        else{
            // return dd('admin');
            $cars = cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')
                        ->get();

            $inventory = DB::select('select COUNT(vehicleidno) as totalcount , updated_at
            FROM inventories
            WHERE invstatus = 1
            GROUP by updated_at
            LIMIT 7');

            //   $format =

            // $result = json_decode($inventory,true);



            for ($i=0; $i < count($inventory) ; $i++) {
                $inventory[$i]->updated_at = Carbon::parse( $inventory[$i]->updated_at)->format('M d Y');
            }
            // return dd($inventory);


            // $invoicecategory = invoicecount::select(['id','modeldescription','count'])->get();

            return view('dashboard',['cars'=>$cars,'inventories'=>$inventory]);
        }




    }
}
