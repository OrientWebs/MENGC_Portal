<?php

namespace App\Livewire\Admin;

use App\Http\Requests\Prerequisctics\StorePrerequiscticsRequest;
use App\Livewire\Admin\Base\BaseComponent;
use App\Services\PrerequisiticService;
use Livewire\Component;

class PrerequisticComponent extends BaseComponent
{
    public  $name, $type, $description, $prerequisitc_id;
    protected $indexRoute = 'admin/prerequistics', $prerequisticService;
    public function boot(PrerequisiticService $prerequisticService)
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
    public function create()
    {
        $this->authorize('prerequistic-create');
    }
    public function edit($id)
    {
        $this->authorize('prerequistic-create');
        $data = $this->prerequisticService->getById($id);
        $this->prerequisitc_id = $data->id;
        $this->type = $data->type;
        $this->description = $data->description;
    }

    public function store()
    {
        $this->authorize('prerequistic-create');
        $validated = StorePrerequiscticsRequest::validate($this);
        $this->prerequisticService->create($validated);

        $this->flashMessage('success', 'Prerequisitc create successfully!');
        return $this->redirectRoute('admin.prerequistics', navigate: true);
    }
    public function update()
    {
        $this->authorize('prerequistic-edit');
        $validated = StorePrerequiscticsRequest::validate($this);
        $this->prerequisticService->update($this->prerequisitc_id, $validated);

        $this->flashMessage('success', 'Prerequisitc update successfully!');
        return $this->redirectRoute('admin.prerequistics', navigate: true);
    }

    public function render()
    {
        switch ($this->currentPage) {
            case ('create'):
                $engType = config('constant.engineer_types');
                return view('admin.prerequistics.create', compact("engType"));
            case ('edit'):
                $engType = config('constant.engineer_types');
                return view('admin.prerequistics.edit', compact('engType'));
            default:
                $prerequistics = $this->prerequisticService->index($this->prePage, $this->search);
                return view('admin.prerequistics.index', compact('prerequistics'));
        }
    }
}
