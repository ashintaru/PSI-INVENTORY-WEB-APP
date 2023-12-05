<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\site as modelSite;
use Livewire\Attributes\On;

class Site extends Component
{
    public $siteid = '';
    public $sitename = '';
    public $siteNameEdit = '';

    public $isEditingSite = true;



    public function editSite($siteId){
        $this->siteid = $siteId;
        $this->isEditingSite = true;
    }

    public function updateSite(){
        $validate = Validator::make(
            ['siteNameEdit' => $this->siteNameEdit, 'siteId'=>$this->siteid ],
            // Validation rules to apply...
            ['siteNameEdit' => 'required|min:3' , 'siteId' => 'required' ],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();
        if(modelSite::where('siteName',$this->siteNameEdit)->exists()){
            session()->flash('warning','the sitename are alreasy exsist');
        }else{
            $site = modelSite::where('id',$this->siteid)->first();
            $site->siteName = strtoupper($this->siteNameEdit);
            $site->save();
            session()->flash('success','the site have been update properly');
            $this->reset(['siteid','isEditingSite','sitename']);
        }

    }

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
