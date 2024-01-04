<?php

namespace App\Livewire;

use App\Models\cars;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\client;
use App\Models\washing as modelWashing;


class InstaledTools extends Component
{
    public int $userid ;



    public function render()
    {
        // $client = client::select(['id','clientName'])->get();

        $forInstalation = modelWashing::with(['car','instalation'])->paginate(25);
        return view('livewire.instaled-tools',['forInstalation'=>$forInstalation]);
    }
}
