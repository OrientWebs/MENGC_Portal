<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Base\BaseComponent;
use App\Services\EngineeringDisciplineService;

class EngineeringDisciplineComponent extends BaseComponent
{
    public $name;
    protected $indexRoute = 'admin/disciplines';
    protected EngineeringDisciplineService $disciplineService;
    public function boot(EngineeringDisciplineService $disciplineService)
    {
        $this->verifyAuthorization("discipline-access");
        $this->disciplineService = $disciplineService;
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
                return view('admin.disciplines.create');

            case 'edit':
                return view('admin.disciplines.edit');
            default:
                $disciplines = $this->disciplineService->index($this->prePage, $this->search);
                return view('admin.disciplines.index', compact('disciplines'));
        }
    }
}
