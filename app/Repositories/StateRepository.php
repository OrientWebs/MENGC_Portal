<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use App\Utilities\BaseCrudRepository;

class StateRepository extends BaseCrudRepository
{
    public  function __construct(State $model)
    {
        parent::__construct($model);
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function searchState($prePage = null, $search = null)
    {

        $query = $this->model->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
                $q->orWhere('abbreviation', 'like', "%{$search}%");
            });
        }

        return $query->paginate($prePage);
    }
}
