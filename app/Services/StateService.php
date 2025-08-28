<?php

namespace App\Services;

use App\Repositories\StateRepository;

class StateService
{
    private StateRepository $stateRepository;
    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }
    public function find($id)
    {
        return $this->stateRepository->find($id);
    }
    public function index($prePage = null, $search = null)
    {
        $roles = $this->stateRepository->searchState($prePage, $search);
        return $roles;
    }
}
