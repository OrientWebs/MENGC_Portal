<?php

namespace App\Repositories;

use App\Models\EngineeringDiscipline;
use App\Utilities\BaseCrudRepository;

class EngineeringDisciplineRepository extends BaseCrudRepository
{
    public function __construct(EngineeringDiscipline $model)
    {
        parent::__construct($model);
    }

    public function searchDiscipline($prePage = null, $search = null)
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
