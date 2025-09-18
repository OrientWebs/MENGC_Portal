<?php

namespace App\Livewire\Admin\PE;

use App\Traits\AuthorizeRequests;
use App\Traits\HandleFlashMessage;
use Livewire\Component;
use App\Models\Prerequistic;
use Livewire\Attributes\Layout;

class PETermsComponent extends Component
{
    use AuthorizeRequests;

    #[Layout('admin.layouts.app')]
    public $accepted = false;

    public function boot()
    {
        $this->authorize('PEregistration-create');
    }
    public function proceed()
    {
        if ($this->accepted) {
            return $this->redirectRoute('admin.pe-form-create', navigate: true);
        }
        $this->addError('accepted', 'You must accept the terms and conditions to continue.');
    }

    public function render()
    {
        $terms = Prerequistic::where('type',  1)->get();
        return view('admin.pe.terms', compact('terms'));
    }
}
