<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carstatus;
use Exception;


class invenotycontroller extends Controller
{

    public function index($action = "pass"){

        try {
            //code...
            if($action == "pass"){
                $cars = carstatus::
                where('havebeenchecked',"=",1)
                ->where('havebeenpassed',"=",1)
                ->paginate(25);
            }
            if($action == "fail"){
                $cars = carstatus::
                where('havebeenchecked',"=",1)
                ->where('havebeenpassed',"=",0)
                ->paginate(25);
            }
            return view('inventory',['data'=>$cars,'action'=>$action]);

        } catch (Exception $th) {
            //throw $th;
            return view('inventory',['data'=>null,'action'=>$action]);

        }


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
