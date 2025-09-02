<?php

namespace App\Services;

use App\Repositories\PrerequisticRespository;

class PrerequisitcService
{
    protected PrerequisticRespository $prerequisticRespository;
    public function __construct(PrerequisticRespository $prerequisticRespository)
    {
        $this->prerequisticRespository = $prerequisticRespository;
    }
    public function index($prePage = null, $search = null)
    {
        return $this->prerequisticRespository->getAll($prePage, $search);
    }
}
