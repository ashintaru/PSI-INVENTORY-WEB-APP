<?php

namespace App\Jobs;

use App\Imports\carsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    /**
     * Create a new job instance.
     */
    public function __construct($file)
    {
        //
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        return[
            new cars([
            'mmpcmodelcode'=> $row[0],
            'mmpcmodelyear'=> $row[1] ,
            'mmpcoptioncode'=> $row[2],
            'extcolorcode'=> $row[3],
            'modeldescription'=> $row[4],
            'exteriorcolor'=> $row[5],
            'csno'=> $row[6],
            'tag'=>$tag,
            'bilingdate'=> Carbon::parse($row[7]),
            'vehicleidno'=> $row[8],
            'engineno'=> $row[9],
            'productioncbunumber'=> $row[10],
            'bilingdocuments'=> $row[11],
            'vehiclestockyard'=> $row[12],
        ]),
        new carstatus([
            'vehicleidno'=>$row[8],
            'havebeenpassed'=>false,
            'havebeenchecked'=>false,
            'havebeenreleased'=>false,
            'havebeenstored'=>false,
            'hasloosetool'=>false,
            'hassettool'=>false,
            'hasdamage'=>false
            ])
        ]    };
}
