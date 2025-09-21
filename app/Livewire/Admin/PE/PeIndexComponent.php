<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PeIndexComponent extends PERegistrationBseComponent
{

    public function mount() {}

    public function render()
    {
        $PeDatas = $this->PEservice->index($this->prePage, $this->search);
        return view('admin.pe.index', compact('PeDatas'));
    }
}
