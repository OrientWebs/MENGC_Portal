<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;
use App\Utilities\BaseCrudRepository;

class RoleRepository extends BaseCrudRepository
{
    protected Permission $permission;
    public  function __construct(Role $model, Permission $permission)
    {
        parent::__construct($model);
        $this->permission = $permission;
    }

    public function getPermission()
    {
        return $this->permission;
    }

    public function find($id)
    {
        return $this->model->with('permissions')->findOrFail($id);
    }

    public function searchRole($prePage = null, $search = null)
    {

        $query = $this->model->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        return $query->paginate($prePage);
    }
}
