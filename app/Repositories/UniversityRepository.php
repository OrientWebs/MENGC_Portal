<?php

namespace App\Repositories;

use App\Models\University;
use App\Utilities\BaseCrudRepository;

class UniversityRepository extends BaseCrudRepository
{
    public  function __construct(University $model)
    {
        parent::__construct($model);
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function search($prePage = null, $search = null)
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
