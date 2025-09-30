<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
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
    public function __store()
    {
        $baseValidated = StoreBaseRegistrationFormRequest::validate($this);
        $peValidated = StorePeRegistrationFormRequest::validate($this);
        $registration = $this->PEservice->create($baseValidated, $peValidated);

        if ($this->nrc_card_front) {
            $registration
                ->addMedia($this->nrc_card_front->getRealPath())
                ->usingFileName($this->nrc_card_front->getClientOriginalName())
                ->toMediaCollection('nrc_photos');
        }

        if ($this->nrc_card_back) {
            $registration
                ->addMedia($this->nrc_card_back->getRealPath())
                ->usingFileName($this->nrc_card_back->getClientOriginalName())
                ->toMediaCollection('nrc_photos');
        }

        $this->flashMessage('success', 'PE registration saved successfully!');
        return redirect()->route('admin.dashboard');
    }

    public function store()
    {
        $baseValidated = StoreBaseRegistrationFormRequest::validate($this);
        $peValidated   = StorePeRegistrationFormRequest::validate($this);

        // $registrationForm is now an actual Eloquent model
        $registrationForm = $this->PEservice->create($baseValidated, $peValidated);

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