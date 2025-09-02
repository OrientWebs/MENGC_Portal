<?php

namespace App\Repositories;

use App\Models\Prerequistic;
use App\Utilities\BaseCrudRepository;

class PrerequisticRespository extends BaseCrudRepository
{
    public function __construct(Prerequistic $model)
    {
        parent::__construct($model);
    }

    public function getAll($prePage = null, $search = null)
    {
        $query = $this->model->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', "%{$search}%");
            });
        }

        return $query->paginate($prePage);
    }
}
