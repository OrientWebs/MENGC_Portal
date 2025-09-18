<?php

namespace App\Repositories;

use App\Models\Academic;
use Faker\Provider\Base;
use App\Utilities\BaseCrudRepository;

class AcademicRepository extends BaseCrudRepository
{

    public function __construct(Academic  $model)
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

        return $query->paginate($prePage);
    }
}
