<?php

namespace App\Http\Livewire;

use App\Models\Tarif;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class TarifComponent extends Component
{
    public $trfs;
    public $state = [
        'Tar_Description'=>'',
        'Tar_Euro' => '',
    ];

    public $updateMode = false;


    public function mount()
    {
        $this->trfs = Tarif::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        Tarif::create($this->state);

        $this->reset('state');
        $this->trfs = Tarif::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $trf = Tarif::findOrFail($id);

        $this->state = [
            'Tar_Description'=>$trf->Tar_Description,
            'Tar_Euro' => $trf->Tar_Euro,
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
            'Tar_Description'=> 'required',
            'Tar_Euro' => 'required',
        ])->validate();

        if ($this->state['Tar_Description']) {
            $trf = Tarif::find($this->state['Tar_Description']);
            $trf->update([
                'Tar_Euro' => $this->state['Tar_Euro'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->trfs = Tarif::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Tarif::find("aaa")->delete();
            //Tarif::find($id)->delete();
            $this->trfs = Tarif::all();
        }
    }
    public function render()
    {
        return view('livewire.tarif-component');
    }
}
