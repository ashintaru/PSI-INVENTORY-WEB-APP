<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\invoicecount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return;
// use Illuminate\Support\Facades\Cache;


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
            $cars = cars::get();

            $inventory = DB::select('select COUNT(vehicleidno) as totalcount , updated_at
            FROM inventories
            GROUP by updated_at
            LIMIT 7');

            // return dd($inventory);
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
