<?php

namespace App\Livewire\Admin\PE;

use App\Livewire\Admin\PE\PERegistrationBseComponent;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PECreateComponent extends PERegistrationBseComponent
{
    public function store()
    {
        $this->authorize('PEregistration-create');
        $validated = StoreBaseRegistrationFormRequest::validate($this);
    }
    public function render()
    {
        $nrcStates = $this->PEservice->getAllNrcState();
        $nrcTownship = $this->PEservice->getNrcTownship();
        $nrcType  = $this->PEservice->getNrcType();
        return view("admin.pe.create", compact('nrcStates', 'nrcTownship', 'nrcType'));
    }
}
