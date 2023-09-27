<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;
use App\Models\inventory;
use PDF;


class pdfcontroller extends Controller
{
    //
    public function showEmployees(){
        $data = cars::all();
        return view('cars', compact('data'));
    }

    public function createPDF() {
        // retreive all records from db
        $data = cars::get()->toArray();
        // share data to view
        view()->share('data',$data);
        $pdf = PDF::loadView('cars', $data);
        // download PDF file with download method
        return $pdf->stream();
    }

}
