<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PEIndexCoponent extends PERegistrationBseComponent
{

    public function mount() {}

    public function render()
    {
        $registerNo = $this->PEservice->generateRegisterNo();
        $this->register_no = $registerNo;
        return view('admin.pe.index');
    }
}
