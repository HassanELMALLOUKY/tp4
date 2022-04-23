<?php

namespace App\Http\Livewire;

use App\Models\Agriculteur;
use App\Models\Parcelle;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Http\Request;
class ParcellesComponent extends Component
{
    public $parcelles;
    public $state = [
        'Par_Nom' => '',
        'Par_Lieu' => '',
        'Par_Superficie' => '',
        'agriculteur_id' => '',
    ];

    public $updateMode = false;


    public function mount()
    {
        $this->parcelles = Parcelle::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {

        Parcelle::create($this->state);

        $this->reset('state');
        $this->parcelles = Parcelle::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $parcelle = Parcelle::find($id);

        $this->state = [
            'Par_Nom' => $parcelle['Par_Nom'],
            'Par_Lieu' => $parcelle['Par_Lieu'],
            'Par_Superficie' => $parcelle['Par_Superficie'],
            'agriculteur_id'=> $parcelle['agriculteur_id']
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
            'Par_Nom' => 'required',
            'Par_Lieu' => 'required',
            'Par_Superficie'=>'required'
        ])->validate();

        if ($this->state['id']) {
            $parcelle = Parcelle::find($this->state['id']);
            $parcelle->update([
                'Par_Nom' => $this->state['Par_Nom'],
                'Par_Lieu' => $this->state['Par_Lieu'],
                'Par_Superficie' => $this->state['Par_Superficie'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->parcelles = Parcelle::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Parcelle::where('id',$id)->delete();
            $this->parcelles = Parcelle::all();
        }
    }
    public function render()
    {
        return view('livewire.parcelles-component');
    }
}
