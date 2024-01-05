<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\client as modelClient;
use Illuminate\Support\Facades\Validator;

class ClientManagement extends Component
{
    public $clientName = '';
    public $clientStatus = 1;

    public function submit(){
        $validate = Validator::make(
            ['clientName' => $this->clientName],
            // Validation rules to apply...
            ['clientName' => 'required|min:3'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        if(!modelClient::where('clientName',$this->clientName)->exists()){
            modelClient::create([
                'clientName'=>$this->clientName,
                'status'=>$this->clientStatus
            ]);
            session()->flash('success','the Client have been update properly');
            $this->reset(['clientName']);
        }
        else{
            session()->flash('failed','opps something happend');
        }
    }
    public function render()
    {
        $clients = modelClient::get();
        return view('livewire.client-management',['clients'=>$clients]);
    }
}
