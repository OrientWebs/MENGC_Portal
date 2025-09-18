<?php

namespace App\Services;

use App\Repositories\UniversityRepository;

class UniversityService
{
    private UniversityRepository $universityRepository;
    public function __construct(UniversityRepository $universityRepository)
    {
        $this->universityRepository = $universityRepository;
    }
    public function find($id)
    {
        return $this->universityRepository->find($id);
    }
    public function index($prePage = null, $search = null)
    {
        $roles = $this->universityRepository->search($prePage, $search);
        return $roles;
    }
}
