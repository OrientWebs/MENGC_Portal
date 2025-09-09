<?php

namespace App\Livewire\Admin\PE;

use App\Livewire\Admin\PE\PERegistrationBseComponent;

class PECreateComponent extends PERegistrationBseComponent
{

    public function boot()
    {
        $this->authorize('PEregistration-create');
    }
    public function render()
    {
        return view("admin.pe.create");
    }
}
