<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\batching;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Batchingg extends Component
{
    use WithPagination;

    public $batchId;

    public function remove($batchId){

    }

    public function select($batchId){

        $this->batchId = $batchId;
        $this->dispatch('select-batch',$this->batchId);
        request()->session()->flash('success','the unit have been selected !!');
    }

    #[On('unit-batch'),On('select-batch'),on('relode-batchlist')]
    public function render()
    {
        $userid = Auth::user()->id;
        $batching = batching::where('userid',$userid)->paginate(10);
        return view('livewire.batchingg',['batches'=>$batching]);
    }
}
