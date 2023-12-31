<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carstatus;
use App\Models\cars;
use Exception;


class invenotycontroller extends Controller
{

    public function index($action = "pass"){


    }
    //
    public function search(Request $request , $action = 'pass'){
        $input = $request->all();

        $cars=null;
        if ($input['search']){
            if($action == "pass"){
                $cars = carstatus::
                where('havebeenchecked',"=",1)
                ->where('havebeenpassed',"=",1)
                ->where('vehicleidno',$input['search'])
                ->get();

            }

            if($action == "fail"){
                $cars = carstatus::
                where('havebeenchecked',"=",1)
                ->where('havebeenpassed',"=",0)
                ->where('vehicleidno',$input['search'])
                ->get();
            }

            // return dd($cars['id']);

        }
        return view('inventory',['data'=>$cars,'action'=>$action]);
    }
}
