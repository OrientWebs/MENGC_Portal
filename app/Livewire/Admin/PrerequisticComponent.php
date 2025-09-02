<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Base\BaseComponent;
use App\Services\PrerequisitcService;
use Livewire\Component;

class PrerequisticComponent extends BaseComponent
{
    public  $name, $type, $description;
    protected $indexRoute = 'admin/prerequistics', $prerequisticService;
    public function boot(PrerequisitcService $prerequisticService)
    {
        $this->verifyAuthorization("prerequistic-access");
        $this->prerequisticService = $prerequisticService;
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
            case ('create'):
                return view('admin.prerequistics.create');
            case ('edit'):
                return view('admin.prerequistics.edit');
            default:
                $prerequistics = $this->prerequisticService->index($this->prePage, $this->search);
                return view('admin.prerequistics.index', compact('prerequistics'));
        }
    }
}
