<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Base\BaseComponent;
use App\Services\MinistryService;

class MinistryComponent extends BaseComponent
{
    public string $name = "";
    protected $indexRoute = "admin/ministries";
    protected MinistryService $ministryService;

    public function boot(MinistryService $ministryService)
    {
        $this->authorizeAccess("ministry-access");
        $this->ministryService = $ministryService;
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
                return view('admin.ministries.create');

            case 'edit':
                return view('admin.ministries.edit');
            default:
                $ministries = $this->ministryService->index($this->prePage, $this->search);
                return view('admin.ministries.index', compact('ministries'));
        }
    }
}
