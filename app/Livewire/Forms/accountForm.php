<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class accountForm extends Form
{
    public $account = '';

    #[Rule('required|min:5')]
    public $name = '';
    #[Rule('required|min:5')]
    public $email = '';
    #[Rule('required')]
    public $role = '';
    public $client = null;
    #[Rule('required|confirmed|min:5')]
    public $password = '';
    #[Rule('required')]
    public $password_confirmation  = '';


    public function save()
    {
        $this->validate();
        try {
            //code...
            if(User::where('email',$this->email)->exists()){
                return  session()->flash('warning','this Email is already exists try another email.');
            }else{
                User::create(
                    [
                        'name'=>$this->name,
                        'email'=>$this->email,
                        'tags'=>$this->client,
                        'role'=>$this->role,
                        'password'=>Hash::make($this->password)
                    ]
                );

                $this->reset(['name','email','client','role','password']);
                session()->flash('success','Account have been saved successfully!!.');
            }
        } catch (\Throwable $th) {
            session()->flash('failed','there was a problem after submiting the form...');
        }
    }

    public function remove(){

    }


}
