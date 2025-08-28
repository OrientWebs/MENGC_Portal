<?php

namespace App\Livewire\Admin;

use App\Services\StateService;
use Livewire\Attributes\Layout;
use App\Livewire\Admin\Base\BaseComponent;

class StateComponent extends BaseComponent
{
    #[Layout('admin.layouts.app')]
    public $name, $code;

    protected $indexRoute = "admin/states";
    protected $createRoute, $editRoute, $showRoute;

    protected StateService $stateService;

    public function boot(StateService $stateService)
    {
        $this->verifyAuthorization("state-access");
        $this->stateService = $stateService;
    }

    public function mount()
    {
        $this->createRoute = "{$this->indexRoute}/create";
        $this->editRoute   = "{$this->indexRoute}/edit/*";
        $this->showRoute   = "{$this->indexRoute}/show/*";

        $this->determineCurrentPage([
            $this->indexRoute => 'index',
            $this->createRoute => 'create',
            $this->editRoute   => 'edit',
            $this->showRoute   => 'show'
        ]);
    }
    public function render()
    {
        switch ($this->currentPage) {
            case 'create':
                return view('admin.states.create');

            case 'edit':
                return view('admin.states.edit');
            case 'show':
                return view('admin.states.show');
            default:
                $states = $this->stateService->index($this->prePage, $this->search);
                return view('admin.states.index', compact('states'));
        }
    }
}
