<?php

namespace App\Services;

use App\Repositories\AcademicRepository;

class AcademicService
{
    protected $academicRepository;
    public function __construct(AcademicRepository $academicRepository)
    {
        $this->academicRepository = $academicRepository;
    }

    public function index($prePage = null, $search = null)
    {
        return $this->academicRepository->search($prePage, $search);
    }
}
