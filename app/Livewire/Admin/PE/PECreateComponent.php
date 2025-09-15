<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PECreateComponent extends PERegistrationBseComponent
{

    public $nrcStates = [];
    public $nrcTownshipsEn = [];
    public $nrcTownshipsMm = [];
    public $nrcTypes = [];

    public function mount()
    {
        $this->nrcStates = $this->PEservice->getAllNrcState();
        $this->nrcTypes  = $this->PEservice->getNrcType();
    }

    public function updatedNationalityType($value)
    {
        if ($value === 'PR') {
            $this->reset([
                'nrc_state_en',
                'nrc_township_en',
                'nrc_type_en',
                'nrc_no_en',
                'nrc_state_mm',
                'nrc_township_mm',
                'nrc_type_mm',
                'nrc_no_mm'
            ]);
        }

        if ($value === 'NRC') {
            $this->reset(['permanent_resident_no']);
        }
    }

    // Update township when state changes
    public function updatedNrcStateEn($stateId)
    {
        $this->nrcTownshipsEn = $this->PEservice->getNrcTownship($stateId);
        $this->nrc_township_en = null;
    }

    public function updatedNrcStateMm($stateId)
    {
        $this->nrcTownshipsMm = $this->PEservice->getNrcTownship($stateId);
        $this->nrc_township_mm = null;
    }

    public function store()
    {
        $validated = StoreBaseRegistrationFormRequest::validate($this);
        if ($this->nationality_type === 'NRC') {
            $validated += [
                'nrc_no_en' => format_nrc($validated, 'en'),
                'nrc_no_mm' => format_nrc($validated, 'mm'),
            ];
        }
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
