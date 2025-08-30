<?php

namespace App\Services;

use App\Repositories\EngineeringDisciplineRepository;

class EngineeringDisciplineService
{
    protected EngineeringDisciplineRepository $disciplinaRepository;
    public function __construct(EngineeringDisciplineRepository $disciplineRepository)
    {
        $this->disciplinaRepository = $disciplineRepository;
    }
    public function getRepository()
    {
        return $this->disciplinaRepository;
    }
    public function index($prePage = null, $search = null)
    {
        return $this->disciplinaRepository->searchDiscipline($prePage, $search);
    }
}
