<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cars;


class indexcontroller extends Controller
{
    //
    public function index(){


                    // return dd();
        return view('dashboard');

    }
}
