<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\findings;
use App\Models\blockingHistory;
use App\Models\released;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class UnitProfile extends Component
{
    use WithFileUploads;
    public $id;
    public $photo;
    public $preview = false;
    public $isUploading = false;


    public function togglePreview(){
        $this->preview = !$this->preview;
    }

    public function toggleUploading(){
        $this->isUploading = !$this->isUploading;
    }

    public function uploadPhoto(){
        $unit = released::where('vehicleid',$this->id)->first();
        if($unit->photo == null){
            if($this->photo){
                $name = $this->photo->hashName(); // Generate a unique, random name...
                $this->photo->storeAs('uploads', $name,'public');
                $unit->photo = $name;
            }
            else{
                return ;
            }
        }else{
            File::delete(public_path('storage/uploads/'.$unit->photo));
            $name = $this->photo->hashName(); // Generate a unique, random name...
            $this->photo->storeAs('uploads', $name,'public');
            $unit->photo = $name;
        }
        $unit->save();
    }

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $car = cars::where('id',$this->id)->
        with(['blocking','receive','inventory','stencil','washing','installing','pdi','released'])->first();
        $findings = findings::where('vehicleid',$this->id)->orderBy('created_at','DESC')->paginate(3);
        $history = blockingHistory::where('vehicleid',$this->id)->with(['car','fromblocking','toblocking'])->orderBy('created_at','DESC')->get();
        // return dd($car->stencil);
        // return dd($findings);
        return view('livewire.unit-profile',['car'=>$car,'findings'=>$findings,'history'=>$history]);
    }
}
