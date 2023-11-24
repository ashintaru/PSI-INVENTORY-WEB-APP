<?php

namespace App\Livewire;

use App\Livewire\Forms\accountForm;
use Livewire\Component;
use App\Models\User;
use App\Models\client;


class Account extends Component
{


    public accountForm $accountForm;
    //toggleling button
    public $selectedAcct ='';

    public $isAdding = false;
    public $isEditinngRoles = false;
    public $isEditinngClient = false;

    public $action = '';



    public function selectAcct( $id = null , $action = null){
        if($id == null && $action == null)
            return ;
        elseif($action == 1){
            $this->reset(['selectedAcct','isEditinngClient','isEditinngRoles']);
            $this->isEditinngRoles = true;
            $this->selectedAcct = $id;
        }
        elseif($action == 2){
            $this->reset(['selectedAcct','isEditinngClient','isEditinngRoles']);
            $this->isEditinngClient = true;
            $this->selectedAcct = $id;
        }
        else
            return;
    }

    public function updateRole(){
        $this->accountForm->role =  $this->accountForm->role;
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
        $clients = client::all();
        return view('livewire.account',['accounts'=>$accounts,'clients'=>$clients]);
    }
}
