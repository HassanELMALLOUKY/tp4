<?php
namespace App\Http\Livewire;

use App\Models\Agriculteur;
use App\Models\Car;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Http\Request;
class AgriculteurComponent extends Component
{
    public $agrs;
    public $state = [
        'id'=>'',
        'Agr_Nom' => '',
        'Agr_Prn' => '',
        'Agr_Resid' => '',
    ];

    public $updateMode = false;


    public function mount()
    {
        $this->agrs = Agriculteur::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        Agriculteur::create($this->state);

        $this->reset('state');
        $this->agrs = Agriculteur::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $agr = Agriculteur::find($id);

        $this->state = [
            'id'=>$agr['id'],
            'Agr_Nom' => $agr['Agr_Nom'],
            'Agr_Prn' => $agr['Agr_Prn'],
            'Agr_Resid' => $agr['Agr_Resid'],
        ];

    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'id'=>'required',
            'Agr_Nom' => 'required',
            'Agr_Prn' => 'required',
            'Agr_Resid' => 'required',
        ])->validate();

        if ($this->state['id']) {
            $car = Agriculteur::find($this->state['id']);
            $car->update([
                'Agr_Nom' => $this->state['Agr_Nom'],
                'Agr_Prn' => $this->state['Agr_Prn'],
                'Agr_Resid' => $this->state['Agr_Resid'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->agrs = Agriculteur::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Agriculteur::where('id',$id)->delete();
            $this->agrs = Agriculteur::all();
        }
    }
    public function render()
    {
        return view('livewire.agriculteur-component');
    }
}
