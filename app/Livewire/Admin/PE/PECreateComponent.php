<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PECreateComponent extends PERegistrationBseComponent
{

    public function mount()
    {
        $this->nrcStates = $this->PEservice->getAllNrcState();
        $this->nrcTypes  = $this->PEservice->getNrcType();

        // pre-select the first NRC type
        if (!empty($this->nrcTypes)) {
            $this->nrc_type_en = $this->nrcTypes[0]->name_en;
            $this->nrc_type_mm = $this->nrcTypes[0]->name_mm;
        }
    }

    public function store()
    {
        $validated = StoreBaseRegistrationFormRequest::validate($this);
        $this->PEservice->create($validated);

        $this->flashMessage('success', 'PE registration saved successfully!');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $registerNo = $this->PEservice->generateRegisterNo();
        $this->register_no = $registerNo;
        return view('admin.pe.create');
    }
}
