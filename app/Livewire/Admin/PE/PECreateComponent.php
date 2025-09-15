<?php

namespace App\Livewire\Admin\PE;

use Illuminate\Support\Facades\Log;
use App\Livewire\Admin\PE\PERegistrationBseComponent;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PECreateComponent extends PERegistrationBseComponent
{
    public $register_no;
    public $nrcStateEn = [];
    public $nrcTownshipsEn = [];
    public $nrcTownshipsMm = [];


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
                'nrc_no_mm',
            ]);
        }

        if ($value === 'NRC') {
            $this->reset(['permanent_resident_no']);
        }
    }
    public function store()
    {
        $this->authorize('PEregistration-create');
        $validated = StoreBaseRegistrationFormRequest::validate($this);
        Log::info('Validated data:', $validated);
        $this->PEservice->create($validated);
        $this->flashMessage('success', 'User create successfully!');
        return $this->redirectRoute('admin.dashboard', navigate: true);
    }
    public function render()
    {
        $registerNo = $this->PEservice->generateRegisterNo();
        $this->register_no = $registerNo;
        $nrcStates = $this->PEservice->getAllNrcState();
        $nrcTypes  = $this->PEservice->getNrcType();
        return view("admin.pe.create", compact('nrcStates',  'nrcTypes'));
    }
}
