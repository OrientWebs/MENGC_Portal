<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Base\BaseComponent;
use App\Services\QualificationService;
use Livewire\Component;

class QualificationComponent extends BaseComponent
{
    public $name;
    protected $indexRoute = 'admin/qualifications';
    protected QualificationService $qualificationService;
    public function boot(QualificationService $service)
    {
        $this->verifyAuthorization('qualification-access');
        $this->qualificationService = $service;
    }

    public function mount()
    {
        $this->authorize("qualification-access");
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
                return view('admin.qualifications.create');

            case 'edit':
                return view('admin.qualifications.edit');
            default:
                $qualifications = $this->qualificationService->index($this->prePage, $this->search);
                return view('admin.qualifications.index', compact('qualifications'));
        }
    }
}
