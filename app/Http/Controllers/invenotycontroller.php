<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carstatus;



class invenotycontroller extends Controller
{

    public function index($action = null){

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
        return view('inventory',['data'=>$cars]);

    }
    //
}
