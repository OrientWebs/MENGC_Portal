<?php

namespace App\Services;

use App\Repositories\PrerequisticRespository;

class PrerequisiticService
{
    protected PrerequisticRespository $prerequisticRespository;
    public function __construct(PrerequisticRespository $prerequisticRespository)
    {
        $this->prerequisticRespository = $prerequisticRespository;
    }
    public function getById($id)
    {
        return $this->prerequisticRespository->getById($id);
    }
    public function update($id, $data)
    {
        return $this->prerequisticRespository->update($id, $data);
    }
    public function create(array $data)
    {
        return $this->prerequisticRespository->create($data);
    }
    public function index($prePage = null, $search = null)
    {
        return $this->prerequisticRespository->getAll($prePage, $search);
    }
}