<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Utilities\BaseCrudRepository;

class UserRepository extends BaseCrudRepository
{
    protected Role  $role;
    public function __construct(User $model, Role $role)
    {
        parent::__construct($model);
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function searchUsers($perPage = null, $search = null, $role = null, $date = null)
    {
        if (is_null($perPage)) {
            $perPage = config('constant.prePage');
        }

        $query = $this->model->query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        if ($role) {
            $query->whereHas('roles', function ($q) use ($role) {
                $q->where('id', $role);
            });
        }
        if ($date) {
            $query->whereDate('created_at', $date);
        }

        return $query->paginate($perPage);
    }
}
