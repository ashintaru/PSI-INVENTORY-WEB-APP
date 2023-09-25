<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\importBlockings;
class blockings extends Controller
{
    //
    public function importBlockings(){
        Excel::import(new importBlockings, request()->file('file'));
        return back()->with(['success' => 'success:: the file has been uploaded succesfully...','pr'=>'success']);

    }

}
