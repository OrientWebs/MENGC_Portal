<?php

namespace App\Livewire\Admin;

use App\Http\Requests\Role\RoleStoreReqeuest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Services\RoleService;
use App\Livewire\Admin\Base\BaseComponent;
use Livewire\Attributes\Layout;

class RoleComponent extends BaseComponent
{
    #[Layout('admin.layouts.app')]
    public $name, $role_id, $isActive, $permissionsSelected = [];

    protected $indexRoute = "admin/roles";
    protected $createRoute, $editRoute, $showRoute;

    protected RoleService $roleService;

    public function boot(RoleService $roleService)
    {
        $this->verifyAuthorization("role-access");
        $this->roleService = $roleService;
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

    public function toggleActive($roleId)
    {
        $this->verifyAuthorization('role-edit');
        $role = $this->roleService->find($roleId);
        $role->is_active = !$role->is_active;
        $role->save();

        $this->flashMessage('success', 'Role Update successfully!');
        return $this->redirectRoute('admin.roles', navigate: true);
    }


    public function store()
    {
        $this->verifyAuthorization('role-create');
        $validated = RoleStoreReqeuest::validate($this);
        $this->roleService->store($validated, $this->permissionsSelected);

        session()->flash('success', 'Role created successfully!');

        $this->flashMessage('success', 'Role created successfully!');
        return $this->redirectRoute('admin.roles', navigate: true);
    }
    public function edit($id)
    {
        $this->verifyAuthorization('role-edit');
        $role = $this->roleService->find($id);
        $role->load('permissions');
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->permissionsSelected = $role->permissions->pluck('id')->toArray();
    }

    public function update()
    {
        $this->verifyAuthorization('role-edit');
        $validated = RoleUpdateRequest::validate($this, $this->role_id);
        $this->roleService->update($this->role_id, $validated, $this->permissionsSelected);

        $this->flashMessage('success', 'Role update successfully!');
        return $this->redirectRoute('admin.roles', navigate: true);
    }

    public function render()
    {
        $permissions = $this->roleService->getPermission()
            ->groupBy(fn($perm) => explode('-', $perm->name)[0]);
        switch ($this->currentPage) {
            case 'create':
                return view('admin.role.create', ['permissions' => $permissions]);

            case 'edit':
                return view('admin.role.edit', ['permissions' => $permissions]);
            case 'show':
                return view('admin.role.show');
            default:
                $roles = $this->roleService->index($this->prePage, $this->search);
                return view('admin.role.index', compact('roles'));
        }
    }
}
