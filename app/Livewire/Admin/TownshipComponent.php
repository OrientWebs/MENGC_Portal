<?php

namespace App\Livewire\Admin;

use App\Services\StateService;
use Livewire\Attributes\Layout;
use App\Livewire\Admin\Base\BaseComponent;
use App\Services\TownshipService;

class TownshipComponent extends BaseComponent
{
    #[Layout('admin.layouts.app')]
    public $name, $state_id, $search = '', $filterState = null;

    protected $indexRoute = "admin/townships";
    protected $editRoute, $showRoute;

    protected TownshipService $townshipService;

    public function boot(TownshipService $townshipService)
    {
        $this->verifyAuthorization("township-access");
        $this->townshipService = $townshipService;
    }

    public function mount()
    {
        $this->createRoute = "{$this->indexRoute}/create";
        $this->editRoute   = "{$this->indexRoute}/edit/*";

        $this->determineCurrentPage([
            $this->indexRoute => 'index',
            $this->createRoute => 'create',
            $this->editRoute   => 'edit',
        ]);
    }
    public function render()
    {
        switch ($this->currentPage) {
            case 'create':
                return view('admin.townships.create');

            case 'edit':
                return view('admin.townships.edit');
            default:
                $states = $this->townshipService->getStates();
                $townships = $this->townshipService->index($this->prePage, $this->search, $this->filterState);
                return view('admin.townships.index', compact('townships', 'states'));
        }
    }
}
