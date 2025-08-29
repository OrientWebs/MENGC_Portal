<?php

namespace App\Livewire\Admin;

use App\Services\StateService;
use Livewire\Attributes\Layout;
use App\Livewire\Admin\Base\BaseComponent;
use App\Services\UniversityService;

class UniversityComponent extends BaseComponent
{
    #[Layout('admin.layouts.app')]
    public $name;

    protected $indexRoute = "admin/universities";
    protected $createRoute, $editRoute;

    protected UniversityService $universityService;

    public function boot(UniversityService $universityService)
    {
        $this->verifyAuthorization("state-access");
        $this->universityService = $universityService;
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
                return view('admin.universities.create');

            case 'edit':
                return view('admin.universities.edit');
            default:
                $universities = $this->universityService->index($this->prePage, $this->search);
                return view('admin.universities.index', compact('universities'));
        }
    }
}
