<?php

namespace App\Livewire;

use App\Models\blockings;
use App\Models\cars;
use App\Models\invoce;
use App\Models\released;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class InvoiceReleased extends Component
{
    use WithFileUploads;

    #[Rule('nullable|image|max:1028')]
    public $photo;

    public $unitId;
    #[Rule('required|min:3')]
    public $releasedBy;
    #[Rule('required|min:3')]
    public $dealer;
    #[Rule('required')]
    public $dateReleased;
    public $remark;

    public function mount($id){
        $this->unitId = $id;
    }
    public function store(){

        $validate = $this->validate();
        $car = cars::where('id',$this->unitId)->first();
        // dd($car);
        $car->dateReleased = $this->dateReleased;
        $car->releasedBy = $this->releasedBy;
        $car->dealer = $this->dealer;
        if($this->remark == null)
            $car->remark = "NO REMARK";
        else
            $car->remark = $this->remark;
        $car->save();

        $name = null;
        if($this->photo){
            $name = $this->photo->hashName(); // Generate a unique, random name...
            // dd($name
            $this->photo->storeAs('uploads', $name,'public');
        }

        released::create([
            'vehicleid'=>$car->id,
            'vehicleidno'=>$car->vehicleidno,
            'photo'=>$name,
            'status'=>1
        ]);

        $invoiceUnit = invoce::where('vehicleidno',$car->vehicleidno)->first();
        $invoiceUnit->status = 1;
        $invoiceUnit->save();

        $invoiceBlockings = blockings::where('id',$car->invoiceBlock)->first();
        $invoiceBlockings->blockstatus = 0;
        $invoiceBlockings->save();
        return redirect('/invoice')->with('status', 'Profile updated!');
        // return dd("done");

    }





    public function render()
    {
        return view('livewire.invoice-released');
    }
}
