<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\AcademicService;
use App\Livewire\Admin\Base\BaseComponent;

class AcademicComponent extends BaseComponent
{
    public $name;
    protected $indexRoute = "admin/academics", $academicService;
    public function boot(AcademicService $academicService)
    {
        $this->verifyAuthorization("academic-access");
        $this->academicService = $academicService;
    }
    public function mount()
    {
        $this->authorize("academic-access");
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
                return view('admin.academics.create');

            case 'edit':
                return view('admin.academics.edit');
            default:
                $academics = $this->academicService->index($this->prePage, $this->search);
                return view('admin.academics.index', compact('academics'));
        }
    }
}
