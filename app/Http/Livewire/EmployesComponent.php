<?php

namespace App\Http\Livewire;

use App\Models\Agriculteur;
use App\Models\Employe;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EmployesComponent extends Component
{
    public $empls;
    public $state = [
        'Emp_Nss'=>'',
        'Emp_Nom' => '',
        'Emp_Prn' => '',
        'Emp_Tarif' => '',
    ];

    public $updateMode = false;


    public function mount()
    {
        $this->empls = Employe::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        Employe::create($this->state);

        $this->reset('state');
        $this->empls = Employe::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $emp = Employe::find($id);

        $this->state = [
            'Emp_Nss' => $emp['Emp_Nss'],
            'Emp_Nom' => $emp['Emp_Nom'],
            'Emp_Prn' => $emp['Emp_Prn'],
            'Emp_Tarif' => $emp['Emp_Tarif'],
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
            'Emp_Nom' => 'required',
            'Emp_Prn' => 'required',
            'Emp_Tarif' => 'required',
        ])->validate();

        if ($this->state['Emp_Nss']) {
            $car = Employe::find($this->state['Emp_Nss']);
            $car->update([
                'Emp_Nom' => $this->state['Emp_Nom'],
                'Emp_Prn' => $this->state['Emp_Prn'],
                'Emp_Tarif' => $this->state['Emp_Tarif'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->empls = Employe::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Employe::where('Emp_Nss',$id)->delete();
            $this->empls = Employe::all();
        }
    }
    public function render()
    {
        return view('livewire.employes-component');
    }
}
