<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\site as modelSite;
use Livewire\Attributes\On;

class Site extends Component
{
    public $sitename = '';

    public function saveSite(){
        $validate = Validator::make(
            ['sitename' => $this->sitename],
            // Validation rules to apply...
            ['sitename' => 'required|min:3'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        if(modelSite::where('siteName',$this->sitename)->exists()){
            session()->flash('warning','the sitename are alreasy exsist');
        }else{
            modelSite::create(
                [
                    'siteName'=>strtoupper( $this->sitename)
                ]
            );
            $this->reset('sitename');
            $this->dispatch('site-created');
            session()->flash('success','the sitename are alreasy exsist');
        }
    }


    public function selectedSite($id){
        $this->dispatch('this-site',$id);
    }

    public function save(){
    }

    #[On('site-created')]
    public function render()
    {
        $sites = modelSite::all();
        return view('livewire.site',['sites'=>$sites]);
    }
}
