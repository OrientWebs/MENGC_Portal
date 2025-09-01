<?php

namespace App\Repositories;

use App\Models\Ministry;
use App\Utilities\BaseCrudRepository;

class MinistryRepository extends BaseCrudRepository
{
    public function __construct(Ministry $model)
    {
        parent::__construct($model);
    }

    public function search($prePage = null, $search = null)
    {
        $query = $this->model->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        return  $query->paginate($prePage);
    }
}
