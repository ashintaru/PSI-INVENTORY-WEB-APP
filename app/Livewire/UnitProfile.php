<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\findings;
use App\Models\blockingHistory;
use App\Models\released;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class UnitProfile extends Component
{
    use WithFileUploads;

    public $id;
    public $showPhoto = false;
    public $isUpploading = false;
    public $photo;

    public function uploadImage(){
        $car = cars::where('id',$this->id)->first();
        $vin  = $car->vehicleidno;

        $releasedUnit = released::where('vehicleidno',$vin)->first();
        if($releasedUnit->photo ==null){
            if($this->photo){
                $name = $this->photo->hashName(); // Generate a unique, random name...
                $this->photo->storeAs('uploads', $name,'public');
                $releasedUnit->photo = $name;
            }
            else{
                return ;
            }
        }else{
            unlink('storage/uploads/'.$releasedUnit->photo);
            $name = $this->photo->hashName(); // Generate a unique, random name...
            $this->photo->storeAs('uploads', $name,'public');
            $releasedUnit->photo = $name;
        }
        $releasedUnit->save();
        $this->dispatch('relode-page');
    }

    public function toggleUploading(){
        $this->isUpploading = !$this->isUpploading;
    }
    public function tooglePhoto(){
        $this->showPhoto = ! $this->showPhoto;
    }
    public function mount($id){
        $this->id = $id;
    }
    #[On('relode-page')]
    public function render()
    {
        $car = cars::where('id',$this->id)->with(['blocking','receive','inventory','released'])->first();
        $findings = findings::where('vehicleid',$this->id)->orderBy('created_at','DESC')->paginate(3);
        $history = blockingHistory::where('vehicleid',$this->id)->with(['car','fromblocking','toblocking','account'])->orderBy('created_at','DESC')->get();
        // return dd($history->account);
        // return dd($findings);
        return view('livewire.unit-profile',['car'=>$car,'findings'=>$findings,'history'=>$history]);
    }
}
