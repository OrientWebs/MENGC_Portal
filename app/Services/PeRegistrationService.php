<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PErepository;

class PeRegistrationService
{
    private PErepository $PErepository;
    public function __construct(PErepository $PERepository)
    {
        $this->PErepository = $PERepository;
    }

    public function getAllNrcState()
    {
        return $this->PErepository->getNrcState()->get();
    }

    public function getNrcTownship()
    {
        return $this->PErepository->getNrcTwonship()->get();
    }
    public function getNrcType()
    {
        return $this->PErepository->getNrcType()->get();
    }
}
