<?php

namespace App\Services;

use App\Repositories\StateRepository;
use App\Repositories\TownshipRepository;

class TownshipService
{
    private TownshipRepository $townshipRepository;
    public function __construct(TownshipRepository $townshipRepository)
    {
        $this->townshipRepository = $townshipRepository;
    }
    public function find($id)
    {
        return $this->townshipRepository->find($id);
    }
    public function getStates()
    {
        return $this->townshipRepository->states()->get();
    }
    public function index($prePage = null, $search = null, $states = null)
    {
        $roles = $this->townshipRepository->search($prePage, $search, $states);
        return $roles;
    }
}
