<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\invoce;
use App\Models\sample;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Carbon\Carbon;


class Invoicetable extends Component
{
    use WithPagination;
    public $count = 1;
    public $todos = [];

    public $todo = '';

    public $title = '';


    public function save()
    {
        sample::create([
            'title' => $this->title,
        ]);
        return redirect()->back();
        $this->title = null;
    }
    public function add()
    {
        $this->todos[] = $this->todo;

        $this->todo = '';
    }


    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        $invoices = invoce::with('car')->paginate(25);
        return view('livewire.invoicetable',['data'=>$invoices])->layout('layouts.app');
    }
}
