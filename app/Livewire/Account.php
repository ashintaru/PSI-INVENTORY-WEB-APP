<?php

namespace App\Livewire;

use App\Livewire\Forms\accountForm;
use Livewire\Component;
use App\Models\User;

class Account extends Component
{


    public accountForm $accountForm;
    //toggleling button
    public $isAdding = false;

    public $isEditinngRoles = false;
    public $editRole = '';

    public $selectedAcct ='';
    public $action = '';



    public function selectAcct( $id = null , $action = null){
        if($id == null && $action == null)
            return ;
        elseif($action == 1){
            $this->isEditinngRoles == true;
            $this->selectedAcct == $id;
        }else
            return;
    }

    public function updateRole(){

    }

    public function toggleCreate(){
        $this->isAdding =  !$this->isAdding;
    }
    public function store(){
        $this->accountForm->save();
    }
    public function render()
    {
        $accounts = User::all();
        return view('livewire.account',['accounts'=>$accounts]);
    }
}
