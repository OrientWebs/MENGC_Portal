<?php

namespace App\Services;

use App\Repositories\MinistryRepository;

class MinistryService
{
    private MinistryRepository $MinistryRepository;
    public function __construct(MinistryRepository $ministryRepository)
    {
        $this->MinistryRepository = $ministryRepository;
    }

    public function index($prePage = null, $search = null)
    {
        return $this->MinistryRepository->search($prePage, $search);
    }
}
