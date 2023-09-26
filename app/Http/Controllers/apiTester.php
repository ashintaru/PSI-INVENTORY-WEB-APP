<?php

namespace App\Http\Controllers;
use App\Models\cars;

use Illuminate\Http\Request;

class apiTester extends Controller
{
    //
    public function fetchRawdata(Request $request){
        return cars::paginate(25);
    }
}
