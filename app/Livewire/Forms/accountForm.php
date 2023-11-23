<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class accountForm extends Form
{
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
        User::create(
            [
                'name'=>$this->name,
                'email'=>$this->email,
                'tags'=>$this->client,
                'role'=>$this->role,
                'password'=>Hash::make($this->password)
            ]
        );

    }

}
