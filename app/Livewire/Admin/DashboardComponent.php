<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\AcademicService;
use App\Livewire\Admin\Base\BaseComponent;

class DashboardComponent extends Component
{
    #[Layout('admin.layouts.app')]
    public $name;
    public function boot(AcademicService $academicService)
    {
        // $this->verifyAuthorization("dashboard-access");
    }


    public function render()
    {
        return view('admin.dashboard');
    }
}