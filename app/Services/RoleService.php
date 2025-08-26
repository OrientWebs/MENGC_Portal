<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Spatie\Permission\Models\Permission;

class RoleService
{
    private RoleRepository $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function find($id)
    {
        return $this->roleRepository->find($id);
    }
    public function getPermission()
    {
        return $this->roleRepository->getPermission()->get();
    }
    public function store(array $data, $permissions)
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data['guard_name'] = "web";
        $role = $this->roleRepository->create($data);
        $permissions_id =   $this->roleRepository->getPermission()->find($permissions);
        $role->syncPermissions($permissions_id);
        return $role;
    }
    public function update($id, array $data, $permissions)
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $data['guard_name'] = "web";
        $role = $this->roleRepository->update($id, $data);
        $permissions = $this->roleRepository->getPermission()->whereIn('id', $permissions)->get();
        $role->syncPermissions($permissions);
        return $role;
    }

    public function index($prePage = null, $search = null)
    {
        $roles = $this->roleRepository->searchRole($prePage, $search);
        return $roles;
    }
}
