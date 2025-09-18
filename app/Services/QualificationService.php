<?php

namespace App\Services;

use App\Repositories\QualificationRepository;

class QualificationService
{
    private $qualificationRepository;
    public function __construct(QualificationRepository $qualificationRepository)
    {
        $this->qualificationRepository = $qualificationRepository;
    }

    public function index($prePage = null, $search = null)
    {
        return $this->qualificationRepository->search($prePage, $search);
    }
}
