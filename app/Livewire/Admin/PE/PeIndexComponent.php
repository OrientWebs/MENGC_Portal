<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PeIndexComponent extends PERegistrationBseComponent
{

    public function mount() {}

    public function delete($id)
    {
        $this->verifyAuthorization("PEregistration-delete");
        $this->PEservice->deleteRegistrationForm($id);

        $this->flashMessage('success', 'PEregistration delete successfully!');
        return $this->redirectRoute('admin.users', navigate: true);
    }
    public function render()
    {
        $PeDatas = $this->PEservice->index($this->prePage, $this->search);
        return view('admin.pe.index', compact('PeDatas'));
    }
}