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
    }

    public function store()
    {
        $validated = StoreBaseRegistrationFormRequest::validate($this);
        dd($validated);
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
