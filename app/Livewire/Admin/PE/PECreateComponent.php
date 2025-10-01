<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeAcademicQualifications;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Pe\StorePeAcademicQualificationsRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PECreateComponent extends PERegistrationBaseComponent
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
        $baseValidated = StoreBaseRegistrationFormRequest::validate($this);
        $peValidated   = StorePeRegistrationFormRequest::validate($this);
        $peAcademicQualifications = StorePeAcademicQualificationsRequest::validate($this);
        // $registrationForm is now an actual Eloquent model
        $registrationForm = $this->PEservice->create($baseValidated, $peValidated, $peAcademicQualifications);

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