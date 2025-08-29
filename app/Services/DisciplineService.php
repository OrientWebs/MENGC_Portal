<?php

namespace App\Services;

use App\Repositories\DisciplineRepository;

class DisciplineService
{
    protected DisciplineRepository $disciplinaRepository;
    public function __construct(DisciplineRepository $disciplineRepository)
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
