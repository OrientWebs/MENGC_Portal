<?php

namespace App\Repositories;

use App\Models\AcademicQualification;
use App\Utilities\BaseCrudRepository;

class QualificationRepository extends BaseCrudRepository
{
    public function __construct(AcademicQualification $model)
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
