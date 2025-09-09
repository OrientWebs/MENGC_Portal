<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HandlePageState;
use Livewire\Attributes\Layout;
use App\Traits\AuthorizeRequests;
use App\Traits\HandleFlashMessage;

class PERegistrationBseComponent extends Component
{
    use WithPagination, AuthorizeRequests, HandlePageState, HandleFlashMessage;
    #[Layout('admin.layouts.app')]
    public $prePage;

    public $search = '';

    public function mount()
    {
        $this->authorize('PEregistration-access');
    }
}
