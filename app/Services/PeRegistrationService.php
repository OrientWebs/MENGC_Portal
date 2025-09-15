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

    public function getNrcTownship($stateId)
    {
        return $this->PErepository->getNrcTwonship()->where('state_id', $stateId)->get();
    }
    public function getNrcType()
    {
        return $this->PErepository->getNrcType()->get();
    }
    public function generateRegisterNo()
    {
        return $this->PErepository->generateRegisterNo();
    }

    public function create($baseData, $peData = null)
    {
        $user = auth()->user()->id;
        $baseData += [
            'status' => 'approved',
        ];
        $BaseData = $this->PErepository->createRegistratonForm($baseData);
    }
}
